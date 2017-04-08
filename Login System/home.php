<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
    <title>Welcome</title>
    <link rel="stylesheet" href="/style.css" type="text/css" />

    <style>
        body, html {
            height: 100%;
        }

        .bg {
            /* The image used */
            background-image: url("/assets/Plaza_at_The_Robert_Gordon_University_2.jpg");

            /* Full height */
            height: 100%;

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        body {margin:0;}

        .topnav {
            overflow: hidden;
            background-color: #333;
        }

        .topnav a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        .topnav a.active {
            background-color: rebeccapurple;
            color: white;
        }

    </style>

</head>

<body background="/assets/Plaza_at_The_Robert_Gordon_University_2.jpg">

<div class="topnav">
    <a class="active" href="/index.php">Home</a>
    <a href="/Forum/new_topic.php">Create a New topic</a>
    <a href="/Forum/main_forum.php">Go to Main Forum</a>
    <a href="/Login%20System/login.php">Login</a>
</div>
<div class="bg"></div>

<h1>Hello</h1>

<?php
session_start();
echo "Hello" .$_SESSION['username']. "<br>";
?>
</body>
<footer>
    <A HREF="logout.php">Logout</A>

</footer>
</html>