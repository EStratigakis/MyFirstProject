<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/style.css" type="text/css" />
    <title>Creating a New Topic!</title>
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
<link rel="stylesheet" href="/style.css">

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

<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
        <form id="form1" name="form1" method="post" action="add_new_topic.php">
            <td>
                <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
                    <tr>
                        <td colspan="3" bgcolor="#E6E6E6"><strong>Create New Topic</strong> </td>
                    </tr>
                    <tr>
                        <td width="14%"><strong>Topic</strong></td>
                        <td width="2%">:</td>
                        <td width="84%"><input name="topic" type="text" id="topic" size="50" /></td>
                    </tr>
                    <tr>
                        <td valign="top"><strong>Detail</strong></td>
                        <td valign="top">:</td>
                        <td><textarea name="detail" cols="50" rows="3" id="detail"></textarea></td>
                    </tr>
                    <tr>
                        <td><strong>Name</strong></td>
                        <td>:</td>
                        <td><input name="name" type="text" id="name" size="50" /></td>
                    </tr>
                    <tr>
                        <td><strong>Email</strong></td>
                        <td>:</td>
                        <td><input name="email" type="text" id="email" size="50" /></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><input type="submit" name="Submit" value="Submit" />
                            <input type="reset" name="Submit2" value="Reset" /></td>
                    </tr>
                </table>
            </td>
        </form>
    </tr>
</table>
</body>
</html>