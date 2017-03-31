<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Superhero System</title>
</head>
<body>
<header>
    <h1>The Super-Superhero System</h1>
    <h2>Display all Battles</h2>
    <p><a href="index.php">Return to home</a></p>
</header>
<main>
    <?
    include ("connection.php");
    mysqli_select_db($link,'superbattles');
    if(isset($_GET['id']))
    {
        $superheroID = $_GET['id'];
        $sql_query = "SELECT * FROM superherobattles WHERE superheroID = '$superheroID'";
    }
    else
    {
        $sql_query = "SELECT * FROM superherobattles";
    }

    $result = $link->query($sql_query);

    while($row = $result->fetch_array())
    {

        $firstName = $row['firstname'];
        $lastName = $row['lastname'];
        $mainSuperpower = $row['mainSuperpower'];
        $villainFought = $row['villainFought'];

        echo "<article>
              <p> The superhero known as <strong>{$firstName} {$lastName}</strong> recently fought <strong>{$villainFought}</strong> using <strong>{$mainSuperpower}</strong></p>";

    }
    ?>
</main>
</body>
</html>