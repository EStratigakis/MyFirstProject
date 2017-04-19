<?php
session_start();
include_once('../dbConnect.php');

if(empty($_POST["oldpass"]) || empty($_POST["nepswd"] || empty($_POST["ne1pswd"])))
{
    echo "<script type='text/javascript'>alert('All fields are required!')</script>";
    header('Location: /stuchange/stuchange.html');
}
else
{
    $usename = $_SESSION['username'];
    $oldpass = $_POST['oldpass'];
    $nepass = $_POST['nepswd'];
    $ne1pass = $_POST['ne1pswd'];

    if ($nepass === $ne1pass) {
        mysqli_select_db($db, 'user');
        $sql = "SELECT uid FROM users WHERE username = '$usename' AND password='$oldpass'";

        $result = mysqli_query($db, $sql);

        if (mysqli_num_rows($result) == 1)
        {
            $result1 = mysqli_query($db, "UPDATE `users` SET `password`='$nepass' WHERE `username`= '$usename'");
            if ($result1)
            {
                echo "<script type='text/javascript'>alert('Your password was changed!')</script>";
                ?>window.history.go(-1);<?php
            }
            else {
                echo "There is a problem! Try again later or contact an administrator!";
            }
        }
        else
        {
            echo "Wrong Password";
            header('Location: /stuchange/stuchange.html');
        }
    }
    else
    {
        echo "New passwords are not the same!";
        header('Location: /stuchange/stuchange.html');
    }
}
?>