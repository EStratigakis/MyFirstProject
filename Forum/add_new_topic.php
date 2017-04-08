<?php
include ("dbConnect.php");

$tbl_name="fquestions";
$db_name="myforum"; // Database name
mysqli_select_db($db,"$db_name")or die("cannot select DB");
// get data that sent from form
$topic=$_POST['topic'];
$detail=$_POST['detail'];
$name=$_POST['name'];
$email=$_POST['email'];

$datetime=date("d/m/y h:i:s"); //create date time

$sql="INSERT INTO $tbl_name(topic, detail, name, email, datetime)VALUES('$topic', '$detail', '$name', '$email', '$datetime')";
$result=mysqli_query($db,$sql);

if($result){
    echo "Successful<BR>";
    echo "<a href=main_forum.php>View your topic</a>";
}
else {
    echo "ERROR";
}
?>

<head>
    <meta charset="UTF-8">
    <title>New Topic Added</title>
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="assets/CSS/unsemantic-grid-responsive-tablet.css">
    <style>
        body {margin:0;background: url("/assets/Plaza_at_The_Robert_Gordon_University_2.jpg");}

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
</body>