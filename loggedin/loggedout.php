<?php
session_start();
unset($_SESSION["username"]);
unset($_SESSION["password"]);

echo "<script type='text/javascript'>alert('Successfully Logged Out')</script>";
header('URL =  http://strato1.azurewebsites.net');
?>