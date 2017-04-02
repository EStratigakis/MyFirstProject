<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Superhero System</title>
</head>
<body>
<main>
    <header>
        <h1>The Super-Superhero System</h1>
        <h2>Superhero Home Page</h2>
        <link rel="stylesheet" href="style.css">
    </header>
    <p>What would you like to do?</p>
    <ul>
        <link rel="stylesheet" href="style.css">
        <li><a href="superheroform.html">Insert a superhero</a></li>
        <li><a href="displaySuperheros.php">Display all superheroes</a></li>
        <li><a href="battle.php">Insert a battle</a></li>
        <li><a href="displayBattles.php">Display all battles</a></li>
    <ul>
        <?
            include("dbConnect.php");
            mysqli_select_db($db,'superbattles');
            $sql_query = "SELECT * FROM superheros";

            $result = $db->query($sql_query);

            while($row = $result->fetch_array())
            {
                $firstname = $row['firstName'];
                $lastname = $row['lastName'];
                $id = $row['superheroID'];
                echo "<li> <a href='displayBattles.php?id={$id}'>Battles for {$firstname} {$lastname}</a></li>";
            }
        ?>
    </ul>
    </ul>
</main>
</body>
</html>


