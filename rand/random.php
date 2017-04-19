<?php
session_start();
    include_once("../dbConnect.php");

    $db_name = "stu"; // Database name
    mysqli_select_db($db, "$db_name") or die("cannot select DB");

    if (empty($_POST["gnum"])) {
        echo "<script type='text/javascript'>alert('The required field is not filled!')</script>";
        header('Refresh: 1; URL = http://strato1.azurewebsites.net');
    } else {

        $gnum = $_POST['gnum'];

        mysqli_select_db($db, 'stu');

        $w = "SELECT student_id FROM student;";
        $res = mysqli_query($db, $w);

        $e = "SELECT COUNT(*) AS total FROM groups;";
        $res1 = mysqli_query($db, $e);
        $data = mysqli_fetch_assoc($res1);

        $gcount = 0;

        foreach ($res AS $row)
        {
            if ($gcount <= $data['total'])
            {
                $t = "INSERT INTO assign_group(student_id,group_id) VALUES ($row,$gcount);";
                $res2 = mysqli_query($db,$t);

                if ($res2) {?><script type="text/javascript">window.history.go(-2);</script><?php}
                else{echo "<script type='text/javascript'>alert('Error Importing Values!')</script>";}
            }
            else
            {
                $gcount = 1;
                $q = "INSERT INTO assign_group(student_id,group_id) VALUES ($row,$gcount);";
                $res3 = mysqli_query($db,$q);

                if ($res3) {?><script type="text/javascript">window.history.go(-2);</script><?php}
                else{echo "<script type='text/javascript'>alert('Error Importing Values!')</script>";}
            }
        }
    }
?>