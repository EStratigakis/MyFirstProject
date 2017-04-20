<?php
session_start();
    include_once("../dbConnect.php");

    $db_name = "stu"; // Database name


        $grname = $_POST['grname'];
        $deg = $_POST['deg'];

        mysqli_select_db($db, $db_name) or die("cannot select DB");
        $sql = "CREATE TABLE ".$grname."(student_id int(4) NOT NULL, fname varchar(65) NOT NULL, lname varchar(65) NOT NULL, num int(7) NOT NULL DEFAULT '0', mail varchar(65) NOT NULL, dg varchar(25) NOT NULL, yr VARCHAR (25) NOT NULL, password VARCHAR (25) NOT NULL, perm_id int(1) NOT NULL);";
        $result = mysqli_query($db, $sql);

    if ($result) {
        mysqli_select_db($db, $db_name) or die("cannot select DB");
        $r = "INSERT INTO ".$grname."(student_id, fname, lname, num, mail, dg, yr, password, perm_id) (SELECT * FROM student WHERE dg = '$deg')";
        $s = mysqli_query($db, $r);
echo "im here";
        if ($s) {
            echo "<script type='text/javascript'>alert('Table has been created and populated')</script>";
            ?>
            <script type="text/javascript">window.history.go(-2);</script><?php
        }
    }
    else{
        echo "<script type='text/javascript'>alert('Table already exists')</script>";
        ?>
        <script type="text/javascript">window.history.go(-1);</script><?php
    }
?>