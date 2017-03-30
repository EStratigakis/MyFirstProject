<!DOCTYPE html>
<?php
include "dbConnect.php.";
?>
<html>
<head>
<title> Hello. Let's hope it works!!!</title>

</head>
<body>
    <?php
    $sql_query = "SELECT * FROM 'marvelmovies'";
    $result=sql_query($db,$sql);
        while($row = $result->fetch_array())
        {
        /* the code inside here is repeated for each item in the array
        You can do things like the following to print out each movie title */

        echo $row;

        }
    ?>
</body>
</html>