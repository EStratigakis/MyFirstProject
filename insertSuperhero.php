<?php

include ("dbConnect.php");

mysqli_select_db($db,'superbattles');

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$superpower = $_POST["mainSuperpower"];

$sql = "INSERT INTO superheros (firstName, lastName, mainSuperpower) VALUES ('$firstname','$lastname','$superpower')";

if (mysqli_query($db, $sql)) {
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}

header("location:index.php");
?>
