<?php

include_once("../dbConnect.php");

$db_name = "stu"; // Database name
mysqli_select_db($db, "$db_name") or die("cannot select DB");

if(empty($_POST["gname"]) || empty($_POST["snum"]))
    {
        echo "<script type='text/javascript'>alert('Both fields are required!')</script>";
        header('Refresh: 1; URL = http://strato1.azurewebsites.net');
    }
else {

    $gname = $_POST['gname'];
    $snum = $_POST['snum'];
    mysqli_select_db($db, 'stu');
    $sql = "CREATE TABLE $gname(student_id int(4) NOT NULL AUTO_INCREMENT, fname varchar(65) NOT NULL, lname varchar(65) NOT NULL, num int(7) NOT NULL DEFAULT '', mail varchar(65) NOT NULL, dg varchar(25) NOT NULL, yr VARCHAR (25) NOT NULL;";

    $result = mysqli_query($db, $sql);


    if ($result) {

        $r = "INSERT INTO $gname(student_id, fname, lname, num, mail, dg, yr) SELECT DISTINCT * FROM student ORDER BY rand() LIMIT $snum;";

        $s = mysqli_query($db, $r);

        if ($r) {
            echo "<script type='text/javascript'>alert('Table has been created and populated')</script>";
            header('Refresh: 1; URL = http://strato1.azurewebsites.net/rand/rform.html');
        }
    }
}
?>