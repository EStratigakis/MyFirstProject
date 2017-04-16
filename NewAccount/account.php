<?php
include_once("../dbConnect.php");

$tbl_name="users";
$db_name="user"; // Database name
mysqli_select_db($db,"$db_name")or die("cannot select DB");
// get data that sent from form
$usr=$_POST['usr'];
$pass=$_POST['pswd'];
$rle=$_POST['rle'];

$sql1 = "SELECT * FROM users(username) WHERE username ='$usr'"; //SQL Query to check if username exists
if ($result = mysqli_query($db,$sql1)) //Executes Query
{
    echo mysqli_num_rows($result);
}
?>