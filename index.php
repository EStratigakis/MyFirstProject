<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Superhero System</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="assets/CSS/unsemantic-grid-responsive-tablet.css">
</head>
<body>
<main>
    <header>
        <h1>The Super-Superhero System</h1>
        <h2>Superhero Home Page</h2>
    </header>
    <p>What would you like to do?</p>
    <ul>
        <li><a href="insertSuperhero.php">Insert a superhero</a></li>
        <li><a href="displaySuperheros.php">Display all superheroes</a></li>
        <li><a href="battle.php">Insert a battle</a></li>
        <li><a href="displayBattles.php">Display all battles</a></li>
    </ul>
        <?php
            include("connection.php");
            mysqli_select_db($link,'superbattles');
            $sql_query = "SELECT * FROM superheros";
            $result = $link->query($sql_query);
            while($row=$result->fetch_array())
            {
                $firstName = $row['firstName'];
                $lastName = $row['lastName'];
                $id = $row['superheroID'];
                echo "<li> <a href='displayBattles.php?id={$id}'>Battles for {$firstName} {$lastName}</a></li>";
            }
        ?>
</main>
</body>
</html>


