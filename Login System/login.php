<!DOCTYPE html>

<html>
<head>
    <title>Login</title>
    <style>
        <style>
        body, html {
            height: 100%;

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        body {margin:0;}

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
        body {

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
</head>
<body background="/assets/Plaza_at_The_Robert_Gordon_University_2.jpg">
<div class="topnav">
    <a class="active" href="/index.php">Home</a>
    <a href="/Forum/new_topic.php">Create a New topic</a>
    <a href="/Forum/main_forum.php">Go to Main Forum</a>
    <a href="/Login%20System/login.php">Login</a>
</div>

<div class="container form-signin">
    <h1>RGU Login</h1>
    <h3>Login

        <br><br>
        <form class = "form-signin" role = "form" method="post" action="login1.php">
            <label>Username:</label><br>
            <input type="text" name="username" placeholder="username" /><br><br>
            <label>Password:</label><br>
            <input type="password" name="password" placeholder="password" /><br><br>
            <input type="checkbox" name="remember" value="1">Remember Me<br><br>
            <input type="submit" name="submit" value = "login"/>
        </form>
        <div class="error"><?php //echo $error;?><?php //echo $username; echo $password;?></div>


</body>
<footer>
    <A HREF="http://efstratios.azurewebsites.net">Home Page</A>
</footer>
</html>

