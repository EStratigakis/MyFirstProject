<?php

include ("connection.php");

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$superpower = $_POST["superpower"];
mysqli_select_db($link,'superbattles');
$sql = "INSERT INTO superheros (firstName, lastName, mainSuperpower) VALUES ('$firstname','$lastname','$superpower')";

if (mysqli_query($link, $sql)) {}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}

header("location:index.php");
?>