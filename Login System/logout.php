<?php
session_start();
session_destroy();
unset($_SESSION["username"]);
unset($_SESSION["password"]);

echo "<script type='text/javascript'>alert('Successfully Logged Out')</script>";
header('Refresh: 1; URL = http://strato1.azurewebsites.net');
?>