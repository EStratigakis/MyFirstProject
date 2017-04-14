<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>Creating a New Topic!</title>
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="/assets/CSS/unsemantic-grid-responsive-tablet.css">
    <style>
        body, html {
            height: 100%;
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        body {margin:0;);}

        .topnav {
            overflow: hidden;
            background-color: #333;
        }

        .topnav a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        .topnav a.active {
            background-color: rebeccapurple;
            color: white;
        }
    </style>
</head>
<body background="/assets/Plaza_at_The_Robert_Gordon_University_2.jpg">
<link rel="stylesheet" href="/style.css">
<div class="topnav">
    <a class="active" href="/index.html">Home</a>
    <a href="/Forum/new_topic.php">Create a New topic</a>
    <a href="/Forum/main_forum.php">Go to Main Forum</a>
    <a href="/Login%20System/login.php">Login</a>
    <a href="/Registration/regi.html">Add a student!</a>
</div>
</body>
</html>
<?php
session_start();
include_once('../dbConnect.php');

if(empty($_POST["username"]) || empty($_POST["password"]))
{
    echo "Both fields are required.";
}else
{

    $username=$_POST['username'];
    $password=$_POST['password'];
    mysqli_select_db($db,'user');
    $sql="SELECT uid FROM users WHERE username='$username' and password='$password'";

    $result=mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,$db);

    if(mysqli_num_rows($result) == 1) {
        if ($_POST["remember_me"] == '1' || $_POST["remember_me"] == 'on') {
            $hour = time() + 3600 * 24 * 30;
            setcookie('username', $username, $hour);
            setcookie('password', $password, $hour);
        }
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $result = mysqli_query($db, "SELECT * from users WHERE username = '$username' and password = '$password'");
        if (mysqli_num_rows($result) == 1)
            {
            header("location: home.php");// Redirecting To another Page
            }
        else
            {
            echo "Cannot access this page!Contact the administrator!";
            }
    }
    else
    {
        echo "Incorrect username or password.";
    }
}

?>
