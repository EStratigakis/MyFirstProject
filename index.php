<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Robert Gordon University</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>
<h1>RGU Login</h1>
<div class="container form-signin">
    <h3>Login
        <style>

        </style>
    <br><br>
    <form class = "form-signin" role = "form" method="post" action="login.php">
        <label>Username:</label><br>
        <input type="text" name="username" placeholder="username" /><br><br>
        <label>Password:</label><br>
        <input type="password" name="password" placeholder="password" />  <br><br>
        <input type="submit" name="submit" value = "login"/>
    </form>
    <div class="error"><?php //echo $error;?><?php //echo $username; echo $password;?></div>

</div>
</body>
</html>