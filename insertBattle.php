<?php

include ("connection.php");

$superheroID = $_POST["superhero"];
$villain = $_POST["villain"];

$sql = "INSERT INTO battles (superheroID, villainFought) VALUES ('$superheroID', '$villain')";

if (mysqli_query($link, $sql)){}
else
{
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}

header("location:index.php");
?>