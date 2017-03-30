<!DOCTYPE html>

<html>
<head>
    <title> Login</title>
</head>
<body>

<?php
include ('dbConnect.php');
define('DB_SERVER', '127.0.0.1:56727');
define('DB_USERNAME', 'strpao13@hotmail.com');
define('DB_PASSWORD', 'Stratos-123');
define('DB_DATABASE', 'info');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);


if(empty($_POST["username"]) || empty($_POST["password"]))
{
    echo "Both fields are required.";
}else
{

$username=$_POST['username'];
$password=$_POST['password'];

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
