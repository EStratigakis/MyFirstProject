<?php
session_start();
unset($_SESSION["username"]);
unset($_SESSION["password"]);
unset($_SESSION['role']);

echo "<script type='text/javascript'>alert('Successfully Logged Out')</script>";
header('Refresh: 2; URL = http://strato1.azurewebsites.net');
?>