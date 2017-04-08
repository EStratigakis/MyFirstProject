<?php
include ("dbConnect.php");
$tbl_name="fquestions";
$db_name="myforum";
mysqli_select_db($db,"myforum")or die("cannot select DB");

$sql="SELECT * FROM $tbl_name ORDER BY id DESC";
// OREDER BY id DESC is order result by descending

$result=mysqli_query($db,$sql);
?>
<head>
    <meta charset="UTF-8">
    <title>Main Forum</title>
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="/assets/CSS/unsemantic-grid-responsive-tablet.css">
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
<body>
<div class="topnav">
    <a class="active" href="/index.php">Home</a>
    <a href="/Forum/new_topic.php">Create a New topic</a>
    <a href="/Forum/main_forum.php">Go to Main Forum</a>
    <a href="/Login%20System/login.php">Login</a>
</div>

<table width="90%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
        <td width="6%" align="center" bgcolor="#E6E6E6"><strong>#</strong></td>
        <td width="53%" align="center" bgcolor="#E6E6E6"><strong>Topic</strong></td>
        <td width="15%" align="center" bgcolor="#E6E6E6"><strong>Views</strong></td>
        <td width="13%" align="center" bgcolor="#E6E6E6"><strong>Replies</strong></td>
        <td width="13%" align="center" bgcolor="#E6E6E6"><strong>Date/Time</strong></td>
    </tr>

    <?php

    // Start looping table row
    while($rows = mysqli_fetch_array($result)){
        ?>
        <tr>
            <td bgcolor="#FFFFFF"><?php echo $rows['id']; ?></td>
            <td bgcolor="#FFFFFF"><a href="view_topic.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['topic']; ?></a><BR></td>
            <td align="center" bgcolor="#FFFFFF"><?php echo $rows['view']; ?></td>
            <td align="center" bgcolor="#FFFFFF"><?php echo $rows['reply']; ?></td>
            <td align="center" bgcolor="#FFFFFF"><?php echo $rows['datetime']; ?></td>
        </tr>

        <?php
// Exit looping and close connection
    }
    ?>

    <tr>
        <td colspan="5" align="right" bgcolor="#E6E6E6"><a href="new_topic.php"><strong>Create New Topic</strong> </a></td>
    </tr>
</table>
</body>
