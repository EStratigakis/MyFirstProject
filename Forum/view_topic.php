<?php

include ("dbConnect.php");
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View the Topics!</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="assets/CSS/unsemantic-grid-responsive-tablet.css">
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
<div class="topnav">
    <a class="active" href="/index.php">Home</a>
    <a href="/Forum/new_topic.php">Create a New topic</a>
    <a href="/Forum/main_forum.php">Go to Main Forum</a>
    <a href="/Login%20System/login.php">Login</a>
</div>
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
</body>
<li><a href="/index.php">Back to Home Page</a></li>