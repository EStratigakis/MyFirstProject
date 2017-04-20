<?php

include_once("../dbConnect.php");
$db_name="myforum";
$tbl_name="fquestions";
mysqli_select_db($db,$db_name)or die("cannot select DB");
// get value of id that sent from address bar
$id=$_GET['id'];
$sql="SELECT * FROM $tbl_name WHERE id='$id'";
$result=mysqli_query($db,$sql);
$rows=mysqli_fetch_array($result);
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/style.css" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>View the Topic!</title>
    <style>
        body, html {
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

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/index.html">RGU portal</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="../index.html">Home</a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Menu
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="/Forum/main_forum.php">Forum</a></li>
                    <li><a href="/Upload/upload.html">Upload</a></li>
                    <li><a href="/Registration/regi.html">Add Student</a></li>
                    <li><a href="/NewAccount/account.html">Add User Account</a></li>
                </ul>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/Login%20System/login.php"><span class="glyphicon glyphicon-log-out"></span> Login</a></li>
        </ul>
    </div>
</nav>

<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
        <td><table width="100%" border="0" cellpadding="3" cellspacing="1" bordercolor="1" bgcolor="#FFFFFF">
                <tr>
                    <td bgcolor="#F8F7F1"><strong><?php echo $rows['topic']; ?></strong></td>
                </tr>

                <tr>
                    <td bgcolor="#F8F7F1"><?php echo $rows['detail']; ?></td>
                </tr>

                <tr>
                    <td bgcolor="#F8F7F1"><strong>By :</strong> <?php echo $rows['name']; ?> <strong>Email : </strong><?php echo $rows['email'];?></td>
                </tr>

                <tr>
                    <td bgcolor="#F8F7F1"><strong>Date/time : </strong><?php echo $rows['datetime']; ?></td>
                </tr>
            </table></td>
    </tr>
</table>
<BR>

<?php

$tbl_name2="fanswer"; // Switch to table "forum_answer"
$sql2="SELECT * FROM $tbl_name2 WHERE question_id='$id'";
$result2=mysqli_query($db,$sql2);
while($rows=mysqli_fetch_array($result2)){
    ?>

    <table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
        <tr>
            <td><table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
                    <tr>
                        <td bgcolor="#F8F7F1"><strong>ID</strong></td>
                        <td bgcolor="#F8F7F1">:</td>
                        <td bgcolor="#F8F7F1"><?php echo $rows['a_id']; ?></td>
                    </tr>
                    <tr>
                        <td width="18%" bgcolor="#F8F7F1"><strong>Name</strong></td>
                        <td width="5%" bgcolor="#F8F7F1">:</td>
                        <td width="77%" bgcolor="#F8F7F1"><?php echo $rows['a_name']; ?></td>
                    </tr>
                    <tr>
                        <td bgcolor="#F8F7F1"><strong>Email</strong></td>
                        <td bgcolor="#F8F7F1">:</td>
                        <td bgcolor="#F8F7F1"><?php echo $rows['a_email']; ?></td>
                    </tr>
                    <tr>
                        <td bgcolor="#F8F7F1"><strong>Answer</strong></td>
                        <td bgcolor="#F8F7F1">:</td>
                        <td bgcolor="#F8F7F1"><?php echo $rows['a_answer']; ?></td>
                    </tr>
                    <tr>
                        <td bgcolor="#F8F7F1"><strong>Date/Time</strong></td>
                        <td bgcolor="#F8F7F1">:</td>
                        <td bgcolor="#F8F7F1"><?php echo $rows['a_datetime']; ?></td>
                    </tr>
                </table></td>
        </tr>
    </table><br>

    <?php
}

$sql3="SELECT view FROM $tbl_name WHERE id='$id'";
$result3=mysqli_query($db,$sql3);
$rows=mysqli_fetch_array($result3);
$view=$rows['view'];


// if have no counter value set counter = 1
if(empty($view)){
    $view=1;
    $sql4="INSERT INTO $tbl_name(view) VALUES('$view') WHERE id='$id'";
    $result4=mysqli_query($db,$sql4);
}

// count more value
$addview=$view+1;
$sql5="update $tbl_name set view='$addview' WHERE id='$id'";
$result5=mysqli_query($db,$sql5);
?>

<BR>
<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
        <form name="form1" method="post" action="add_answer.php">
            <td>
                <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
                    <tr>
                        <td width="18%"><strong>Name</strong></td>
                        <td width="3%">:</td>
                        <td width="79%"><input name="a_name" type="text" id="a_name" size="45"></td>
                    </tr>
                    <tr>
                        <td><strong>Email</strong></td>
                        <td>:</td>
                        <td><input name="a_email" type="text" id="a_email" size="45"></td>
                    </tr>
                    <tr>
                        <td valign="top"><strong>Answer</strong></td>
                        <td valign="top">:</td>
                        <td><textarea name="a_answer" cols="45" rows="3" id="a_answer"></textarea></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input name="id" type="hidden" value="<?php echo $id; ?>"></td>
                        <td><input type="submit" name="Submit" value="Submit"> <input type="reset" name="Submit2" value="Reset"></td>
                    </tr>
                </table>
            </td>
        </form>
    </tr>
</table>
<footer>

    <a href="https://www.facebook.com/robertgordonuniversity" class="fa fa-facebook"></a>
    <a href="https://twitter.com/RobertGordonUni" class="fa fa-twitter"></a>
    <a href="https://www.linkedin.com/edu/school?id=12660" class="fa fa-linkedin"></a>
    <a href="https://www.youtube.com/user/RobertGordonUni" class="fa fa-youtube"></a>
    <a href="https://www.instagram.com/robertgordonuni/" class="fa fa-instagram"></a>

</footer>
</body>