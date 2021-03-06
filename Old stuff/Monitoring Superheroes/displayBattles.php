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
    include ("dbConnect.php");

    mysqli_select_db($db,'superbattles');

    if(isset($_GET['id']))
    {
        $superheroID = $_GET['id'];
        $sql_query = "SELECT * FROM superherobattles WHERE superheroID = '$superheroID'";
    }
    else
    {
        $sql_query = "SELECT * FROM superherobattles";
    }

    $result = $db->query($sql_query);

    while($row = $result->fetch_array())
    {

        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $mainSuperpower = $row['mainSuperpower'];
        $villanFought = $row['villanFought'];

        echo "<article>
              <p> The superhero known as <strong>{$firstname} {$lastname}</strong> recently fought <strong>{$villanFought}</strong> using <strong>{$mainSuperpower}</strong> </p>";

    }
    ?>
</main>
</body>
</html>