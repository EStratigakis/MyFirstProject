<?php
session_start();
include_once('../dbConnect.php');

if(empty($_POST["olpass"]) || empty($_POST["npswd"] || empty($_POST["n1pswd"])))
    {
        echo "<script type='text/javascript'>alert('All fields are required!')</script>";
        header('Location: /stuchange/stuchange.html');
    }
else
    {
    $uname = $_SESSION['nou'];
    $olpass = $_POST['olpass'];
    $npass = $_POST['npass'];
    $n1pass = $_POST['n1pass'];

    if ($npass === $n1pass) {
        mysqli_select_db($db, 'stu');
        $sql = "SELECT student_id FROM student WHERE num = '$uname' AND password='$olpass'";

        $result = mysqli_query($db, $sql);

        if (mysqli_num_rows($result) == 1)
        {
            $result1 = mysqli_query($db, "INSERT INTO `student`(`password`) VALUES ('$npass')");
            if ($result1)
            {
                echo "<script type='text/javascript'>alert('Your password was changed!')</script>";
                header('Location: /loggedin/index.php');
            }
            else {
                echo "There is a problem! Try again later or contact an administrator!";
            }
        }
        else
        {
            echo "<script type='text/javascript'>alert('Wrong Password')</script>";
            header('Location: /stuchange/stuchange.html');
        }
    }
    else
    {
        echo "<script type='text/javascript'>alert('New passwords are not the same!')</script>";
        header('Location: /stuchange/stuchange.html');
    }
}
?>