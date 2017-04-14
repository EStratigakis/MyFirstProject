<?php
session_destroy();
echo "<script type='text/javascript'>alert('Successfully Logged Out')</script>";
header(' URL = http://strato1.azurewebsites.net');
?>