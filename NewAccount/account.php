<?php
session_start();
if ($_SESSION['permissions_id'] != 1)
{
    header("Refresh: 3; url= /index.html");
    echo '<h3>ACCESS DENIED - YOU DO NOT HAVE PERMISSIONS TO ACCESS THIS PAGE</h3>';
    echo 'You will be redirected in 3 seconds';
    session_destroy();
    exit();
}
else {
    include_once("../dbConnect.php");

    if (empty($_POST["olpass"]) || empty($_POST["npswd"] || empty($_POST["n1pswd"]))) {
        echo "<script type='text/javascript'>alert('All fields are required!')</script>";
        header('Location: /stuchange/stuchange.html');
    } else {
        $tbl_name = "users";
        $db_name = "user"; // Database name
        mysqli_select_db($db, "$db_name") or die("cannot select DB");
// get data that sent from form
        $usr = $_POST['usr'];
        $pass = md5($_POST['pswd']);
        $rle = $_POST['rle'];

        $count = 0;

        $sql1 = "SELECT * FROM users WHERE username ='$usr';"; //SQL Query to check if username exists
        $result = mysqli_query($db, $sql1); //Executes Query
        while ($row = $result->fetch_array()) {
            $count++;
        }

        if ($count > 0) {
            echo "<script type='text/javascript'>alert('User not Added!')</script>";
            header('Location: /NewAccount/account.html?usernotadded');
        } else {
            $sql = "INSERT INTO users(username, password, permissions_id) VALUES ('$usr', '$pass', '$rle');";
            $result1 = mysqli_query($db, $sql);
            echo "<script type='text/javascript'>alert('User Added!')</script>";
            header('Refresh: 1; URL = http://strato1.azurewebsites.net/NewAccount/account.html');
        }
    }
}
?>