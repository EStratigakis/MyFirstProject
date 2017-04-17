<?php
session_start();
if ($_SESSION['permissions_id'] != 1)
{
    header("Refresh: 3; url= /index.html");
    echo '<h3>ACCESS DENIED - YOU DO NOT HAVE PERMISSIONS TO ACCESS THIS PAGE</h3>';
    echo 'You will be redirected in 3 seconds';
    session_destroy();
    exit();
}
else {
    include_once("../dbConnect.php");

    $tbl_name = "student";
    $db_name = "stu"; // Database name
    mysqli_select_db($db, "$db_name") or die("cannot select DB");

    $result=mysqli_query("SELECT count(*) as total from students");
    $data=mysqli_fetch_assoc($result);
    echo $data['total'];
}
?>