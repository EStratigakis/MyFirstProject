<!DOCTYPE html>

<html>
<head>
    <title> Marvel Movies</title>
</head>
<body>
<?php
include 'dbConnect.php';
mysqli_select_db($link,'marvelmovie'); /* selects the database that is going to used and uses the connection in dbConnet.php */
$sql= "SELECT * FROM marvelmovies WHERE productionStudio = 'Marvel Studios'"; /* this is the sql statement to select everything in the database*/
$result=mysqli_query($link,$sql); /*this stores the statement in a string*/
while($row = $result ->fetch_array())/*runs through the entries in the database one time and puts them in an array*/
{
    /* the code inside here is repeated for each item in the array
    You can do things like the following to print out each movie title */
    $movieTitle = $row['title'];/*gets the title of the movie and puts it a string*/
    echo "<p>" . $movieTitle ."</p>";/* prints the movie title to the end user*/

}
?>
</body>
</html>