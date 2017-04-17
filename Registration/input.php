<?php
session_start();
if ($_SESSION['permissions_id'] != 1 or $_SESSION['permissions_id'] != 3)
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
// get data that sent from form
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $numb = $_POST['matric'];
    $mail = $_POST['mail'];
    $deg = $_POST['dg'];
    $yer = $_POST['yr'];

    $sql = "INSERT INTO student(fname, lname, num, mail, dg, yr) VALUES ('$fname', '$lname', '$numb', '$mail', '$deg', '$yer')";
    $result = mysqli_query($db, $sql);

    if ($result) {
        echo "<script type='text/javascript'>alert('Student Added!')</script>";
        header('Refresh: 1; URL = http://strato1.azurewebsites.net');
    } else {
        echo "ERROR";
    }
}
?>