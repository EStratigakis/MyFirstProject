<!DOCTYPE html>

<html>
<head>
    <title> Marvel Movies</title>
</head>
<body>
    <?php
    include 'dbConnect.php';
    $sql_query = "SELECT * FROM marvelmovies";
    $result=sqlsrv_query($link,$sql_query);
        while (1)
        {
        /* the code inside here is repeated for each item in the array
        You can do things like the following to print out each movie title */

        echo "Hello";

        }
    ?>
</body>
</html>