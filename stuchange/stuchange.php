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

        $uname = $_SESSION['username'];

        if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!-@#$%]{8,16}$/', $_POST['npswd'])) {
            echo "<script type='text/javascript'>alert('Password requirements not met!')</script>";
        }
        else{

        if ($_POST['npswd'] === $_POST['n1pswd']) {

            $olpass = md5($_POST['olpass']);
            $npass = md5($_POST['npswd']);
            $nepass = md5($_POST['n1pswd']);

            mysqli_select_db($db, 'stu');
            $sql = "SELECT student_id FROM student WHERE num = '$uname' AND password='$olpass'";

            $result = mysqli_query($db, $sql);

            if (mysqli_num_rows($result) == 1)
            {
                $result1 = mysqli_query($db, "UPDATE `student` SET `password`='$npass' WHERE `num`= '$uname'");
                if ($result1)
                {
                    echo "<script type='text/javascript'>alert('Your password was changed!')</script>";
                    header('Location: /loggedin/student/index.php');
                }
                else {
                    echo "There is a problem! Try again later or contact an administrator!";
                }
            }
            else
            {
                echo "<script type='text/javascript'>alert('Wrong Password!')</script>";
                header('Location: /stuchange/stuchange.html');
            }
        }
        else
        {
            echo "<script type='text/javascript'>alert('New passwords does not match')</script>";
            header('Location: /stuchange/stuchange.html');
        }
        }
}
?>