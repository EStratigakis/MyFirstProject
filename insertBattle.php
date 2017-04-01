<?php

include ("dbConnect.php");

mysqli_select_db($db,'superbattles');

$superheroID = $_POST["superhero"];
$villan = $_POST["villan"];

$sql = "INSERT INTO battles (superheroID, villanFought) VALUES ('$superheroID', '$villan')";

if (mysqli_query($db, $sql)){
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}

header("location:index.php");
?>