<?php
session_start();
if ($_SESSION['perm_id'] != 2)
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

    $tbl_name2="uload";
    $db_name2="uploads";
    mysqli_select_db($db,"uploads")or die("cannot select DB");

    $sql2="SELECT * FROM $tbl_name2 ORDER BY id DESC";
// OREDER BY id DESC is order result by descending

    $result2=mysqli_query($db,$sql2);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Student Home Page</title>
    <link rel="stylesheet" href="/style.css" type="text/css" />
    <style>
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
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Menu
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="/Forum/main_forum.php">Forum</a></li>
                    <li><a href="/Upload/upload.html">Upload</a></li>
                    <li><a href="/group/index.php">Student</a></li>
                    <li><a href="/stuchange/stuchange.html">Change Password</a></li>
                </ul>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/Login%20System/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
    </div>
</nav>


<div style="width:100%">
    <div style="width:100%">
        <h1 align="center"><?php echo "Hello, " .$_SESSION['nou']. "!";?></h1>
    </div>
    <div class="container">
        <div class="table-responsive">
            <div><b>Forum</b></div>
            <p></p><table class="table table-bordered">
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


</div>
<div class="container">
    <div class="table-responsive">
        <div><b>Students</b></div>
        <p></p><table class="table table-bordered">
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
        </table><br><br>
    </div>
</div>


<div class="container">
    <div class="table-responsive">
        <div><b>Uploads</b></div>
        <p></p><table class="table table-bordered">
            <tr>
                <td width="10%" align="center" bgcolor="#E6E6E6"><strong>#</strong></td>
                <td width="40%" align="center" bgcolor="#E6E6E6"><strong>File Name</strong></td>
                <td width="10%" align="center" bgcolor="#E6E6E6"><strong>File Type</strong></td>
                <td width="10%" align="center" bgcolor="#E6E6E6"><strong>File Size</strong></td>
                <td width="10%" align="center" bgcolor="#E6E6E6"><strong>Upload User</strong></td>
                <td width="10%" align="center" bgcolor="#E6E6E6"><strong>Date & Time</strong></td>
                <td width="10%" align="center" bgcolor="#E6E6E6"><strong>Destination</strong></td>
            </tr>

            <?php

            // Start looping table row
            while($rows = mysqli_fetch_array($result2)){
                ?>
                <tr>
                    <td align="center" bgcolor="#FFFFFF"><?php echo $rows['id']; ?></td>
                    <td align="center" bgcolor="#FFFFFF"><?php echo $rows['filename']; ?></td>
                    <td align="center" bgcolor="#FFFFFF"><?php echo $rows['filetype']; ?></td>
                    <td align="center" bgcolor="#FFFFFF"><?php echo $rows['filesize']; ?></td>
                    <td align="center" bgcolor="#FFFFFF"><?php echo $rows['username']; ?></td>
                    <td align="center" bgcolor="#FFFFFF"><?php echo $rows['datetime']; ?></td>
                    <td align="center" bgcolor="#FFFFFF"><?php echo $rows['destination']; ?></td>
                </tr>

                <?php
// Exit looping and close connection
            }
            ?>

            <tr>
                <td colspan="7" align="right" bgcolor="#E6E6E6"><a href="/Upload/upload.html"><strong>Upload a New File</strong> </a></td>
            </tr>
        </table><br>
    </div>
</div>
<footer>

    <a href="https://www.facebook.com/robertgordonuniversity" class="fa fa-facebook"></a>
    <a href="https://twitter.com/RobertGordonUni" class="fa fa-twitter"></a>
    <a href="https://www.linkedin.com/edu/school?id=12660" class="fa fa-linkedin"></a>
    <a href="https://www.youtube.com/user/RobertGordonUni" class="fa fa-youtube"></a>
    <a href="https://www.instagram.com/robertgordonuni/" class="fa fa-instagram"></a>

</footer>

</body>

</html>