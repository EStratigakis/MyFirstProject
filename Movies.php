<!DOCTYPE html>

<html>
<head>
    <title> Marvel Movies</title>
</head>
<body>
    <?php
    include 'dbConnect.php';
    mysqli_select_db($link,'marvelmovies');
    $sql= "SELECT * FROM marvelmovies";
    $result=mysqli_query($link,$sql);
        while($row = $result->fetch_array())
        {
        /* the code inside here is repeated for each item in the array
        You can do things like the following to print out each movie title */

        echo "Hello";

        }
    ?>
</body>
</html>