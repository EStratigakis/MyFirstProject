include dbConnect.php;

<?php
$sql_query = "SELECT * FROM marvelmovies";
$result=mysqli_query($db,$sql);
while($row = $result->fetch_array())
{
    /* the code inside here is repeated for each item in the array
    You can do things like the following to print out each movie title */

    $movieTitle = $row[‘title’];
    echo “<p>” . $movieTitle . “</p>”;

}
