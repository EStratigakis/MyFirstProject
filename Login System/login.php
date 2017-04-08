<!DOCTYPE html>

<html>
<head>
    <title>Login</title>
    <style>
        body {margin:0;background: url("/assets/Plaza_at_The_Robert_Gordon_University_2.jpg");}

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
<body>
<link rel="stylesheet" href="/style.css">
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
            <input type="password" name="password" placeholder="password" />  <br><br>
            <input type="submit" name="submit" value = "login"/>
        </form>
        <div class="error"><?php //echo $error;?><?php //echo $username; echo $password;?></div>

</body>
<footer>
    <A HREF="http://efstratios.azurewebsites.net">Home Page</A>
</footer>
</html>

