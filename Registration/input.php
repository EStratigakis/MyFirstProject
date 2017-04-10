<?php
include_once("dbConnect.php");

$tbl_name="student";
$db_name="stu"; // Database name
mysqli_select_db($db,"$db_name")or die("cannot select DB");
// get data that sent from form
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$numb=$_POST['matric'];
$mail=$_POST['mail'];
$deg=$_POST['dg'];
$year=$_POST['yr'];

$datetime=date("d/m/y h:i:s"); //create date time

$sql="INSERT INTO $tbl_name(fname, lname, num, mail, dg, yr, datetime)VALUES('$fname', '$lname', '$numb', '$mail', '$deg', '$year', '$datetime')";
$result=mysqli_query($db,$sql);

if($result){
    echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
    header('Refresh: 1; URL = http://efstratios.azurewebsites.net');
}
else {
    echo "ERROR";
}
?>