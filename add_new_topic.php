<?php
include ("dbConnect.php");


// get data that sent from form
$topic=$_POST['topic'];
$detail=$_POST['detail'];
$name=$_POST['name'];
$email=$_POST['email'];
$tbl_name="fquestions";
$datetime=date("d/m/y h:i:s"); //create date time

$sql="INSERT INTO $tbl_name(topic, detail, name, email, datetime)VALUES('$topic', '$detail', '$name', '$email', '$datetime')";
$result=mysqli_query($db,$sql);

if($result){
    echo "Successful<BR>";
    echo "<a href=main_forum.php>View your topic</a>";
}
else {
    echo "ERROR";
}
?>