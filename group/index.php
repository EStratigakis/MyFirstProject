<?php
include_once ("../dbConnect.php");
$tbl_name="student";
$db_name="stu";
mysqli_select_db($db,"stu")or die("cannot select DB");

$sql="SELECT * FROM $tbl_name ORDER BY id DESC";
// OREDER BY id DESC is order result by descending

$result=mysqli_query($db,$sql);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Students Selection</title>
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="/assets/CSS/unsemantic-grid-responsive-tablet.css">
    <style>
        body, html {
            height: 100%;
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        body {margin:0);}

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
    <a class="active" href="/index.html">Home</a>
    <a href="/Forum/new_topic.php">Create a New topic</a>
    <a href="/Forum/main_forum.php">Go to Main Forum</a>
    <a href="/Login%20System/login.php">Login</a>
    <a href="/Registration/regi.html">Add a student!</a>
</div>

<table width="90%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
        <td width="25%" align="center" bgcolor="#E6E6E6"><strong>First Name</strong></td>
        <td width="25%" align="center" bgcolor="#E6E6E6"><strong>Last Name</strong></td>
        <td width="25%" align="center" bgcolor="#E6E6E6"><strong>E-mail</strong></td>
        <td width="25%" align="center" bgcolor="#E6E6E6"><strong>Matriculation Number</strong></td>
    </tr>

    <?php

    // Start looping table row
    while($rows = mysqli_fetch_array($result)){
        ?>
        <tr>
            <td bgcolor="#FFFFFF"><a href="/Registration/input.php?id=<?php echo $rows['student_id']; ?>"><?php echo $rows['fname']; ?></a><BR></td>
            <td align="center" bgcolor="#FFFFFF"><?php echo $rows['lname']; ?></td>
            <td align="center" bgcolor="#FFFFFF"><?php echo $rows['mail']; ?></td>
            <td align="center" bgcolor="#FFFFFF"><?php echo $rows['num']; ?></td>
        </tr>

        <?php
// Exit looping and close connection
    }
    ?>

    <tr>
        <td colspan="5" align="right" bgcolor="#E6E6E6"><a href="/Registration/regi.html"><strong>Add a new student</strong> </a></td>
    </tr>
</table>
</body>
