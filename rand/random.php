<?php
session_start();
if (($_SESSION['permissions_id'] != 3))
{
    header("Refresh: 3; url= /index.html");
    echo '<h3>ACCESS DENIED - YOU DO NOT HAVE PERMISSIONS TO ACCESS THIS PAGE</h3>';
    echo 'You will be redirected in 3 seconds';
    session_destroy();
    exit();
}
else {
    include_once("../dbConnect.php");

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
        echo $lmt.'.'.$snum.'.'.$data['total'];

        $x = 1;

        for ($x = 1; $x <= $gnum; $x++)
        {
            $sql = "CREATE TABLE $x(student_id int(4) NOT NULL, fname varchar(65) NOT NULL, lname varchar(65) NOT NULL, num int(7) NOT NULL DEFAULT '0', mail varchar(65) NOT NULL, dg varchar(25) NOT NULL, yr VARCHAR (25) NOT NULL, password VARCHAR (25) NOT NULL, perm_id int(1) NOT NULL DEFAULT '')";

            $result = mysqli_query($db, $sql);

            $ruid = rand(1, $data['total']);

            if ($result) {

                $r = "INSERT INTO $x(student_id, fname, lname, num, mail, dg, yr, password, perm_id) SELECT * FROM student WHERE student_id = $ruid LIMIT $lmt';'";
                mysqli_select_db($db, "$db_name") or die("cannot select DB");
                $s = mysqli_query($db, $r);
                if ($r) {
                    echo "<script type='text/javascript'>alert('Table has been created and populated')</script>";
                    ?>
                    <script type="text/javascript">window.history.go(-2);</script><?php
                }
            }
        }
    }
}
?>