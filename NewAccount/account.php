<?php
include_once("../dbConnect.php");

$tbl_name="users";
$db_name="user"; // Database name
mysqli_select_db($db,"$db_name")or die("cannot select DB");
// get data that sent from form
$usr=$_POST['usr'];
$pass=$_POST['pswd'];
$rle=$_POST['rle'];

$result = mysqli_query($db,"SELECT uid FROM users WHERE username = '$usr' LIMIT 0,1'"); //Executes Query

if ($result && mysqli_num_rows($result) >= 1)
    {
    echo "<script type='text/javascript'>alert('User Already Exists')</script>";
    header('URL = http://strato1.azurewebsites.net/NewAccount/account.html');
    }
else
    {
    $sql="INSERT INTO users(username, password, permissions_id) VALUES ('$usr', '$pass', '$rle')";
    $result1 = mysqli_query($db,$sql);
    echo "<script type='text/javascript'>alert('User Added!')</script>";
    header('Refresh: 1; URL = http://strato1.azurewebsites.net/NewAccount/account.html');
    }

?>