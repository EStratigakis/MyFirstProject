<?php
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

                $fileDestination = 'uploads/' . $fileNameNew;

                move_uploaded_file($fileTmpName, $fileDestination);

                header("Location: upload.html?uploadsuccess");
            } else {
                echo "The file is too big!";
            }
        } else {
            echo "There was a problem uploading the file!";
        }
    } else {
        echo "You cannot upload this type of file!";
    }
}
?>