<?php
include_once ("../dbConnect.php");
$tbl_name="student";
$db_name="stu";
mysqli_select_db($db,"stu")or die("cannot select DB");

$sql="SELECT * FROM $tbl_name ORDER BY student_id ASC";
// OREDER BY id DESC is order result by descending

$result=mysqli_query($db,$sql);
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/style.css" type="text/css" />
    <title>Students Selection</title>
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

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/index.html">RGU portal</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="/index.html">Home</a></li>
            <li><a href="/Forum/new_topic.php">Create a New topic</a></li>
            <li><a href="/Forum/main_forum.php">Go to Main Forum</a></li>
            <li><a href="/Registration/regi.html">Add a student!</a></li>
            <li><a href="/group/index.php">Student! Selection</a></li>
            <li><a href="/NewAccount/account.html">Add User Account</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/Login%20System/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
    </div>
</nav>


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
            <td align="center" bgcolor="#FFFFFF"><input type="checkbox" name="name1" /><?php echo $rows['fname']; ?></td>
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
