<?php
session_start();
include_once('../dbConnect.php');

if(empty($_POST["nou"]) || empty($_POST["pass"]))
{
    echo "<script type='text/javascript'>alert('Both fields are required!')</script>";
    header('Refresh: 1; URL = http://strato1.azurewebsites.net');
}else {

    $nou = $_POST['nou'];
    $pss = $_POST['pass'];
    mysqli_select_db($db, 'stu');
    $sql = "SELECT student_id FROM students WHERE num='$nou' and password='$pss'";

    $result = mysqli_query($db, $sql);

    $q = mysqli_query($db, "SELECT student_id, perm_id FROM students WHERE num = '$nou' AND password = '$pss' LIMIT 0,1");

    if ($q && mysqli_num_rows($q) > 0) {

        // get associative array
        $array = mysqli_fetch_assoc($q);

        // set session vars
        $_SESSION['perm_id'] = $array['perm_id'];

    }

    if (mysqli_num_rows($result) == 1) {
        if ($_POST["remember_me"] == '1' || $_POST["remember_me"] == 'on') {
            $hour = time() + 3600 * 24 * 30;
            setcookie('nou', $nou, $hour);
            setcookie('pass', $pss, $hour);
        }
        $_SESSION['nou'] = $nou;
        $_SESSION['pass'] = $pss;
        $result1 = mysqli_query($db, "SELECT * from students WHERE num = '$nou' and password = '$pss'");
        if (mysqli_num_rows($result1) == 1) {
            switch ($_SESSION['perm_id']) {
                default:
                    echo 'You do not have enough privileges';
                    break;
                case "2":
                    header("location: /loggedin/student/index.php");// Redirecting To another Page
                    break;
            }
        } else {
            echo "Incorrect username or password.";
        }
    }
}
?>