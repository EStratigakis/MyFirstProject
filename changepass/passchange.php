<?php
session_start();
include_once('../dbConnect.php');

if(empty($_POST["oldpass"]) || empty($_POST["nepswd"] || empty($_POST["ne1pswd"])))
{
    echo "<script type='text/javascript'>alert('All fields are required!')</script>";
}
else
{
    $usename = $_SESSION['username'];


    if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!-@#$%]{8,16}$/', $_POST['nepswd'])) {
        echo "<script type='text/javascript'>alert('Password requirements not met!')</script>";
    }
    else{

    if ($_POST['nepswd'] === $_POST['ne1pswd']) {

        $oldpass = md5($_POST['oldpass']);
        $nepass = md5($_POST['nepswd']);
        $ne1pass = md5($_POST['ne1pswd']);

        mysqli_select_db($db, 'user');
        $sql = "SELECT uid FROM users WHERE username = '$usename' AND password='$oldpass'";

        $result = mysqli_query($db, $sql);

        if (mysqli_num_rows($result) == 1)
        {
            $result1 = mysqli_query($db, "UPDATE `users` SET `password`='$nepass' WHERE `username`= '$usename'");
            if ($result1)
            {
                echo "<script type='text/javascript'>alert('Your password was changed!')</script>";
                ?><script type="text/javascript">window.history.go(-2);</script><?php
            }
            else {
                echo "There is a problem! Try again later or contact an administrator!";
            }
        }
        else
        {
            echo "<script type='text/javascript'>alert('Wrong Password')</script>";

        }
    }
    else
    {
        echo "<script type='text/javascript'>alert('New passwords are not the same!')</script>";

    }
    }
}
?>