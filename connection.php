<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'azure');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'user');
$link = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
if ($link) {
    echo 'OK';
}
?>
