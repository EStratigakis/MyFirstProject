<?php
session_start();
include_once('../dbConnect.php');

if(empty($_POST["username"]) || empty($_POST["password"]))
{
    echo "<script type='text/javascript'>alert('Both fields are required!')</script>";
    header('Refresh: 1; URL = http://strato1.azurewebsites.net');
}else {

    $username = $_POST['username'];
    $password = md5($_POST['password']);
    mysqli_select_db($db, 'user');
    $sql = "SELECT uid FROM users WHERE username='$username' and password='$password'";

    $result = mysqli_query($db, $sql);

    $q = mysqli_query($db, "SELECT uid, permissions_id FROM users WHERE username = '$username' AND password = '$password' LIMIT 0,1");

    if ($q && mysqli_num_rows($q) > 0) {

        // get associative array
        $array = mysqli_fetch_assoc($q);

        // set session vars
        $_SESSION['permissions_id'] = $array['permissions_id'];

    }

    if (mysqli_num_rows($result) == 1) {
        if ($_POST["remember_me"] == '1' || $_POST["remember_me"] == 'on') {
            $hour = time() + 3600 * 24 * 30;
            setcookie('username', $username, $hour);
            setcookie('password', $password, $hour);
        }
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $result1 = mysqli_query($db, "SELECT * from users WHERE username = '$username' and password = '$password'");
        if (mysqli_num_rows($result1) == 1) {
            switch ($_SESSION['permissions_id']) {
                default:
                    echo 'You do not have enough privileges';
                    break;
                case "1":
                    header("location: /loggedin/admin/index.php");// Redirecting To another Page
                    break;
                case "2":
                    header("location: /loggedin/student/index.php");// Redirecting To another Page
                    break;
                case "3";
                    header("location: /loggedin/lecturer/index.php");// Redirecting To another Page
                    break;
            }
        } else {
            echo "Incorrect username or password.";
            header('Location: /Login System/login.php');
        }

    }else {

        echo "'Incorrect username or password!";
        header('Location: /Login System/login.php');
    }
}
?>