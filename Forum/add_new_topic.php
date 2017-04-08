<?php
include ("dbConnect.php");

$tbl_name="fquestions";
$db_name="myforum"; // Database name
mysqli_select_db($db,"$db_name")or die("cannot select DB");
// get data that sent from form
$topic=$_POST['topic'];
$detail=$_POST['detail'];
$name=$_POST['name'];
$email=$_POST['email'];

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

<head>
    <meta charset="UTF-8">
    <title>New Topic Added</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="assets/CSS/unsemantic-grid-responsive-tablet.css">
</head>
