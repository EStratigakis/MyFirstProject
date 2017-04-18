<?php
session_start();

include_once ("../dbConnect.php"); //Includes the php file dbConnect

$tbl_name="upload"; //Sets the $tbl_name variable to be equal to uploads

mysqli_select_db($db,"uploads")or die("cannot select DB"); //Select the database uploads

$usname=$_SESSION['username']; //Gets the username
$artist=$_SESSION['artist'];

$finame=$_POST['finame']; //Gets the file name from the form
$comments=$_POST['comments']; //Get any comments made in the form

$datetime=date("d/m/y h:i:s"); //Stores the date and time when the form was accessed

if(isset($_POST['submit'])) {
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name']; //Gets the name of the file
    $fileTmpName = $_FILES['file']['tmp_name']; //Gts the temp name of the file
    $fileSize = $_FILES['file']['size']; //Gets the size of the file
    $fileError = $_FILES['file']['error']; //Gets the error,if any, during the upload process
    $fileType = $_FILES['file']['type']; //Gets the type of the file

    $fileExt = explode('.', $fileName); //Removes the select values

    $fileActualExt = strtolower(end($fileExt)); //Makes the extension of the file to be lowercase

    $allowed = array('jpg', 'jpeg', 'png', 'doc', 'ppt', 'pdf'); //Lists the allowed files to be upload

    if (in_array($fileActualExt, $allowed)) //Checks if the file type is allowed to be upload
    {
        if ($fileError === 0) //Checks if there was an error in the uploading
        {
            if ($fileSize < 1000000) //Checks the size of the file
            {
                $fileNameNew = uniqid('', true) . "." . $fileActualExt; //Creates a unique id for the file and adds the extension

                $fileDestination = 'uploads/' . $fileNameNew; //Sets the destination for the file to uploaded

                move_uploaded_file($fileTmpName, $fileDestination); //Moves the file to the destination

                $sql="INSERT INTO $tbl_name(filename, filesize, filetype, username, comments, datetime)VALUES('$fileName', '$fileSize', '$fileType', '$usname', '$comments', '$datetime')";
                $result=mysqli_query($db,$sql);

                echo "<script type='text/javascript'>alert('Upload Successful')</script>";

                header("Location: /index.html"); //Changes the header
            }
            else
            {
                echo "<script type='text/javascript'>alert('The file cannot be upload due to the file!')</script>"; //Echos an error if the size of the file is bigger than the parameters
            }
        }
        else
        {
            echo"<script type='text/javascript'>alert('There was a problem uploading the file!')</script>"; //Echos an error if there is a problem with the uplaoding process
        }
    }
    else
    {
        echo"<script type='text/javascript'>alert('You cannot upload this type of file!')</script>"; //Echos an error if the type is not correct
    }
}
?>