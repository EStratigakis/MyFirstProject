<?php
session_destroy();
echo "<script type='text/javascript'>alert('Successfully Logged Out')</script>";
header('Refresh: 1; URL = http://strato1.azurewebsites.net');
?>