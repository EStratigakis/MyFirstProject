<?php
include_once("../dbConnect.php");

$tbl_name="users";
$db_name="user"; // Database name
mysqli_select_db($db,"$db_name")or die("cannot select DB");
// get data that sent from form
$usr=$_POST['usr'];
$pass=$_POST['pswd'];
$rle=$_POST['rle'];


$sql1 = "SELECT * FROM users WHERE username='$usr'";

$result1=mysqli_query($db,$sql1);

$rows = mysqli_num_rows($result1);

if($rows != 1){

    $sql="INSERT INTO users(username, password, role, permissions_id) VALUES ('$usr', '$pass','', '$rle')";
    $result=mysqli_query($db,$sql);

    echo "<script type='text/javascript'>alert('User Added!')</script>";
    header('Refresh: 1; URL = http://strato1.azurewebsites.net/NewAccount/account.html');
}
else {
    echo "<script type='text/javascript'>alert('User Already Exists')</script>";
    header('URL = http://strato1.azurewebsites.net/NewAccount/account.html');
}
?>