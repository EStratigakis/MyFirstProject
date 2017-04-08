<!DOCTYPE html>

<html>
<head>
    <title>Login</title>
</head>
<body>

<div class="container form-signin">
    <h1>RGU Login</h1>
    <h3>Login
        <style>
            body {
                padding-top: 40px;
                padding-bottom: 40px;
                background-color: white;
            }

            .form-signin {
                max-width: 330px;
                padding: 15px;
                margin: 0 auto;
                color: rebeccapurple;
            }

            .form-signin .form-signin-heading,
            .form-signin .checkbox {
                margin-bottom: 10px;
            }

            .form-signin .checkbox {
                font-weight: normal;
            }

            .form-signin .form-control {
                position: relative;
                height: auto;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                padding: 10px;
                font-size: 16px;
            }

            .form-signin .form-control:focus {
                z-index: 2;
            }

            .form-signin input[type="email"] {
                margin-bottom: -1px;
                border-bottom-right-radius: 0;
                border-bottom-left-radius: 0;
                border-color:#017572;
            }

            .form-signin input[type="password"] {
                margin-bottom: 10px;
                border-top-left-radius: 0;
                border-top-right-radius: 0;
                border-color:#017572;
            }

            title{
                text-align: center;
                color: #017572;
            }
        </style>
        <br><br>
        <form class = "form-signin" role = "form" method="post" action="home.php">
            <label>Username:</label><br>
            <input type="text" name="username" placeholder="username" /><br><br>
            <label>Password:</label><br>
            <input type="password" name="password" placeholder="password" />  <br><br>
            <input type="submit" name="submit" value = "login"/>
        </form>
        <div class="error"><?php //echo $error;?><?php //echo $username; echo $password;?></div>
<?php
ob_start();
session_start();

include('C:\Users\strpa\Documents\GitHub\MyFirstProject\dbConnect.php');

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

if(mysqli_num_rows($result) == 1)
    {
        header("location: home.php"); // Redirecting To another Page
    }
else
    {
        echo "Incorrect username or password.";
    }
}

?>

</body>
<footer>
    <A HREF="http://efstratios.azurewebsites.net">Home Page</A>
</footer>
</html>

