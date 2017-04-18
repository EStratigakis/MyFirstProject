<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/style.css" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Login!</title>
</head>
<body background="/assets/Plaza_at_The_Robert_Gordon_University_2.jpg">

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/index.html">RGU portal</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="../index.html">Home</a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Menu
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="/Forum/main_forum.php">Forum</a></li>
                    <li><a href="/Upload/upload.html">Upload</a></li>
                    <li><a href="/Registration/regi.html">Add Student</a></li>
                    <li><a href="/NewAccount/account.html">Add User Account</a></li>
                </ul>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/Login%20System/login.php"><span class="glyphicon glyphicon-log-out"></span> Login</a></li>
        </ul>
    </div>
</nav>

<div class="container">
    <h1>RGU Login</h1>
    <h3>Login</h3>
        <br><br>
        <form role = "form" method="post" action="login1.php">
            <div class="form-group">
                <label for="username">Username:</label><br>
                <input class="form-control" type="text" name="username" placeholder="Enter Username" /><br>
            </div>
            <div class="form-group">
                <label>Password:</label><br>
                <input class="form-control" type="password" name="password" placeholder="Enter Password" /><br>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" name="remember" value="1">Remember Me</label><br><br>
            </div>
                <button type="submit" name="submit" value = "login" class="btn btn-default">Login</button>
        </form>
        <div class="error"><?php //echo $error;?><?php //echo $username; echo $password;?></div>


</body>
<footer>
    <A HREF="http://strato1.azurewebsites.net">Home Page</A>
</footer>
</html>

