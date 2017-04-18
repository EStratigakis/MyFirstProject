<?php
session_start();
if ($_SESSION['permissions_id'] != 1)
{
    header("Refresh: 3; url= /index.html");
    echo '<h3>ACCESS DENIED - YOU DO NOT HAVE PERMISSIONS TO ACCESS THIS PAGE</h3>';
    echo 'You will be redirected in 3 seconds';
    session_destroy();
    exit();
}
else {
    include_once("../../dbConnect.php");
    $tbl_name = "fquestions";
    $db_name = "myforum";
    mysqli_select_db($db, "myforum") or die("cannot select DB");

    $sql = "SELECT * FROM $tbl_name ORDER BY id DESC";
// OREDER BY id DESC is order result by descending

    $result = mysqli_query($db, $sql);

    $tbl_name1 = "student";
    $db_name1 = "stu";
    mysqli_select_db($db, "stu") or die("cannot select DB");

    $sql1 = "SELECT * FROM $tbl_name1 ORDER BY student_id ASC";
// OREDER BY id DESC is order result by descending

    $result1 = mysqli_query($db, $sql1);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Lecturer Login!</title>
    <link rel="stylesheet" href="/style.css" type="text/css" />
    <style>
        body {
            font-family: "Lato", sans-serif;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
        }

        li a, .dropbtn {
            display: inline-block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover, .dropdown:hover .dropbtn {
            background-color: gray;
        }

        li.dropdown {
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {background-color: #f1f1f1}

        .dropdown:hover .dropdown-content {
            display: block;
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
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/index.html">RGU portal</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="/loggedin/admin/index.php">Home</a></li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">Dropdown</a>
                <div class="dropdown-content">
                    <a href="/loggedin/admin/index.php">Home</a>
                    <a href="/Forum/main_forum.php">Forum</a>
                    <a href="/Upload/upload.html">Upload</a>
                    <a href="/Registration/regi.html">Add Student</a>
                    <a href="/NewAccount/account.html">Add User Account</a>
                    <a href="/Login%20System/logout.php">Log Out</a>
                </div>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/Login%20System/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
    </div>
</nav>

<div style="width:100%">
    <div style="width:100%">
        <h1 align="center"><?php echo "Hello, " .$_SESSION['username']. "!";?></h1>
    </div>

    <div class="table-responsive" style="background-color:#eee; height:auto;width:50%;float:left;border: 1px solid black;">
        <div><b>Forum</b></div>
        <p><table width="90%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#9370db">
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
<div class="table-responsive" style="background-color:#fff; height:auto;width:38%;float:right;border: 1px solid black;">
    <div><b>Group</b></div>
    <table width="90%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#9370db">
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