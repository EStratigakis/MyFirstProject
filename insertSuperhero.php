<?php

include ("connection.php");

$firstName = $_POST["firstname"];
$lastName = $_POST["lastname"];
$superpower = $_POST["superpower"];
mysqli_select_db($link,'superbattles');
$sql = "INSERT INTO superheros (firstName, lastName, mainSuperpower) VALUES ('$firstName','$lastName','$superpower')";

if (mysqli_query($link, $sql)) {echo "ok";}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}

header("location:index.php");
?>