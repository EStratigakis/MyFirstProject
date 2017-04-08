<!DOCTYPE html>

<html>
<head>
    <title> Login</title>
</head>
<body>

<?php
include('dbConnect.php');

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

