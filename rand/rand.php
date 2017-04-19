<?php
$db_name = "stu"; // Database name
mysqli_select_db($db, "$db_name") or die("cannot select DB");

if (empty($_POST["gnum"])) {
    echo "<script type='text/javascript'>alert('Thr required field is not filled!')</script>";
    header('Refresh: 1; URL = http://strato1.azurewebsites.net');
} else {

    $gnum = $_POST['gnum'];

    mysqli_select_db($db, 'stu');

    $w = "SELECT COUNT(*) AS total FROM student;";
    $res = mysqli_query($db, $w);
    $data = mysqli_fetch_assoc($res);

    $snum = $data['total'] / $gnum;

    $lmt = round($snum, 0);

    $x = 1;

    for ($x = 1; $x <= $gnum; $x++)
    {
        mysqli_select_db($db, 'stu');
        $sql = "CREATE TABLE `$x`(student_id int(4) NOT NULL, fname varchar(65) NOT NULL, lname varchar(65) NOT NULL, num int(7) NOT NULL DEFAULT '0', mail varchar(65) NOT NULL, dg varchar(25) NOT NULL, yr VARCHAR (25) NOT NULL, password VARCHAR (25) NOT NULL, perm_id int(1) NOT NULL)";
        $result = mysqli_query($db, $sql);

        if ($result) {
            if ($x >= 2) {
                $t = "SELECT student_id FROM student WHERE NOT EXISTS (SELECT student_id FROM '$x-1');";
                $res1 = mysqli_query($db,$t);

                $r = "INSERT INTO `$x`(student_id, fname, lname, num, mail, dg, yr, password, perm_id) SELECT DISTINCT * FROM student ORDER BY rand() LIMIT $lmt;";
                mysqli_select_db($db, "$db_name") or die("cannot select DB");
                $s = mysqli_query($db, $r);
            }else {
                $r = "INSERT INTO `$x`(student_id, fname, lname, num, mail, dg, yr, password, perm_id) SELECT DISTINCT * FROM student ORDER BY rand() LIMIT $lmt;";
                mysqli_select_db($db, "$db_name") or die("cannot select DB");
                $s = mysqli_query($db, $r);
            }
            if ($r) {
                echo "<script type='text/javascript'>alert('Table has been created and populated')</script>";
                ?>
                <script type="text/javascript">window.history.go(-2);</script><?php
            }
        }
    }
}
?>