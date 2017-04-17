<?php
    include_once("../dbConnect.php");

    $tbl_name = "student";
    $db_name = "stu"; // Database name
    mysqli_select_db($db, "$db_name") or die("cannot select DB");

    $result=mysqli_query($db,"SELECT count(*) as total from student");
    $data=mysqli_fetch_assoc($result);
    echo $data['total'];

?>