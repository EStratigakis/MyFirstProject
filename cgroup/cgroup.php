<?php
session_start();
if ($_SESSION['permissions_id'] != 3)
{
    header("Refresh: 3; url= /index.html");
    echo '<h3>ACCESS DENIED - YOU DO NOT HAVE PERMISSIONS TO ACCESS THIS PAGE</h3>';
    echo 'You will be redirected in 3 seconds';
    session_destroy();
    exit();
}
else {
    include_once("../dbConnect.php");

    $tbl_name = "groups";
    $db_name = "stu"; // Database name
    mysqli_select_db($db, "$db_name") or die("cannot select DB");
// get data that sent from form
    $gname = $_POST['gname'];

    $count = 0;

    $sql1 = "SELECT * FROM groups WHERE gname ='$gname';"; //SQL Query to check if username exists
    $result = mysqli_query($db, $sql1); //Executes Query
    while ($row = $result->fetch_array()){
        $count++;
    }

    if ($count > 0)
    {
        echo "<script type='text/javascript'>alert('Group Already Exist!')</script>";
        header('Location: /NewAccount/account.html?usernotadded');
    }
    else
    {
        $sql = "INSERT INTO groups(gname) VALUES ('$gname');";
        $result1 = mysqli_query($db, $sql);
        if ($result1) {
            echo "<script type='text/javascript'>alert('Table Name Created!')</script>";
            header('Refresh: 1; URL = http://strato1.azurewebsites.net/cgroup/cgroup.html');
        }
    }
}
?>