<?php
include_once("../dbConnect.php");

$tbl_name="users";
$db_name="user"; // Database name
mysqli_select_db($db,"$db_name")or die("cannot select DB");
// get data that sent from form
$usr=$_POST['usr'];
$pass=$_POST['pswd'];
$rle=$_POST['rle'];

$sql1 = "SELECT * FROM $tbl_name WHERE username='$usr'"; //SQL Query to check if username exists
$result = mysqli_query($db,$sql1); //Executes Query
$rows = mysqli_num_rows($result); //Count rows selected (1 if a username/password combo can be found)

if($rows == 1){    echo "<script type='text/javascript'>alert('User Already Exists')</script>";
    header('URL = http://strato1.azurewebsites.net/NewAccount/account.html');
}
else {
        $sql="INSERT INTO users(username, password, permissions_id) VALUES ('$usr', '$pass', '$rle')";
        $result1 = mysqli_query($db,$sql);
        echo "<script type='text/javascript'>alert('User Added!')</script>";
        header('Refresh: 1; URL = http://strato1.azurewebsites.net/NewAccount/account.html');
    }
?>