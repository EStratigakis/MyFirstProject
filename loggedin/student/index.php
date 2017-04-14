<?php
session_start();
include_once("../../dbConnect.php");
$tbl_name="fquestions";
$db_name="myforum";
mysqli_select_db($db,"myforum")or die("cannot select DB");

$sql="SELECT * FROM $tbl_name ORDER BY id DESC";
// OREDER BY id DESC is order result by descending

$result=mysqli_query($db,$sql);

$tbl_name1="student";
$db_name1="stu";
mysqli_select_db($db,"stu")or die("cannot select DB");

$sql1="SELECT * FROM $tbl_name1 ORDER BY student_id ASC";
// OREDER BY id DESC is order result by descending

$result1=mysqli_query($db,$sql1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Student Login!</title>
    <link rel="stylesheet" href="/style.css" type="text/css" />
    <style>
        body {
            font-family: "Lato", sans-serif;
        }

        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover, .offcanvas a:focus{
            color: #f1f1f1;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        #main {
            transition: margin-left .5s;
            padding: 16px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
        }
        footer {
            position: absolute;
            left: 0;
            bottom: 0;
            height: 100px;
            width: 100%;
            overflow:hidden;
        }
    </style>
</head>

<body background="/assets/Plaza_at_The_Robert_Gordon_University_2.jpg">

<div class="topnav">
    <a class="active" href="/index.html">Home</a>
    <a href="/Forum/new_topic.php">Create a New topic</a>
    <a href="/Forum/main_forum.php">Go to Main Forum</a>
    <a href="/Login%20System/login.php">Login</a>
</div>
<div style="width:100%">
    <div style="background-color:#b5dcb3; width:100%">
        <h1><?php echo "<h1> Hello " .$_SESSION['username']. "</h1><br>";?></h1>
    </div>
    <a href="https://www.accuweather.com/en/us/new-york-ny/10007/weather-forecast/349727" class="aw-widget-legal">
        <!--
        By accessing and/or using this code snippet, you agree to AccuWeather’s terms and conditions (in English) which can be found at https://www.accuweather.com/en/free-weather-widgets/terms and AccuWeather’s Privacy Statement (in English) which can be found at https://www.accuweather.com/en/privacy.
        -->
    </a><div id="awcc1492186492542" class="aw-widget-current"  data-locationkey="" data-unit="f" data-language="en-us" data-useip="true" data-uid="awcc1492186492542"></div><script type="text/javascript" src="https://oap.accuweather.com/launch.js"></script>

    <div style="background-color:white; height:600px;width:100px;float:left;">
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="/loggedin/student/index.php">Home</a>
            <a href="/Forum/main_forum.php">Forum</a>
            <a href="#">Upload</a>
        </div>
        <div style="background-color:white; height:auto;width:auto;float:left;">
            <span style="font-size:25px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>
        </div>
    </div>

    <div style="background-color:#eee; height:auto;width:auto;float:left;border: 1px solid black;">
        <div><b>Forum</b></div>
        <p><table width="90%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
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
                    <td bgcolor="#FFFFFF"><a href="/Forum/view_topic.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['topic']; ?></a><BR></td>
                    <td align="center" bgcolor="#FFFFFF"><?php echo $rows['view']; ?></td>
                    <td align="center" bgcolor="#FFFFFF"><?php echo $rows['reply']; ?></td>
                    <td align="center" bgcolor="#FFFFFF"><?php echo $rows['datetime']; ?></td>
                </tr>

                <?php
// Exit looping and close connection
            }
            ?>

            <tr>
                <td colspan="5" align="right" bgcolor="#E6E6E6"><a href="/Forum/new_topic.php"><strong>Create New Topic</strong> </a></td>
            </tr>
        </table><br><br>
    </div>


</div>
<div style="background-color:#fff; height:auto;width:auto;float:right;border: 1px solid black;">
    <div><b>Group</b></div>
    <table width="90%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
        <tr>
            <td width="50%" align="center" bgcolor="#E6E6E6"><strong>Last Name</strong></td>
            <td width="50%" align="center" bgcolor="#E6E6E6"><strong>Matriculation Number</strong></td>
        </tr>

        <?php

        // Start looping table row
        while($rows = mysqli_fetch_array($result1)){
            ?>
            <tr>
                <td align="center" bgcolor="#FFFFFF"><?php echo $rows['lname']; ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php echo $rows['num']; ?></td>
            </tr>

            <?php
// Exit looping and close connection
        }
        ?>
    </table>
</div>


<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";
    }
</script>

</body>
<footer>
    <a href="http://www.facebook.com" class="fa fa-facebook"></a>
    <a href="http://www.twitter.com" class="fa fa-twitter"></a>
    <a href="http://www.google.com" class="fa fa-google"></a>
    <a href="http://www.linkedin.com" class="fa fa-linkedin"></a>
    <a href="http://www.youtube.com" class="fa fa-youtube"></a>
    <a href="http://www.instagram.com" class="fa fa-instagram"></a>
    <a href="http://www.reddit.com" class="fa fa-reddit"></a>
</footer>
</html>