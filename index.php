<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Robert Gordon University</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>

<div class="container form-signin">
    <h1>RGU Login</h1>
        <h3>Login
        <style>
            body {
                padding-top: 40px;
                padding-bottom: 40px;
                background-color: white;
            }

            .form-signin {
                max-width: 330px;
                padding: 15px;
                margin: 0 auto;
                color: rebeccapurple;
            }

            .form-signin .form-signin-heading,
            .form-signin .checkbox {
                margin-bottom: 10px;
            }

            .form-signin .checkbox {
                font-weight: normal;
            }

            .form-signin .form-control {
                position: relative;
                height: auto;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                padding: 10px;
                font-size: 16px;
            }

            .form-signin .form-control:focus {
                z-index: 2;
            }

            .form-signin input[type="email"] {
                margin-bottom: -1px;
                border-bottom-right-radius: 0;
                border-bottom-left-radius: 0;
                border-color:#017572;
            }

            .form-signin input[type="password"] {
                margin-bottom: 10px;
                border-top-left-radius: 0;
                border-top-right-radius: 0;
                border-color:#017572;
            }

            title{
                text-align: center;
                color: #017572;
            }
        </style>
    <br><br>
    <form class = "form-signin" role = "form" method="post" action="Login%20System/login.php">
        <label>Username:</label><br>
        <input type="text" name="username" placeholder="username" /><br><br>
        <label>Password:</label><br>
        <input type="password" name="password" placeholder="password" />  <br><br>
        <input type="submit" name="submit" value = "login"/>
    </form>
    <div class="error"><?php //echo $error;?><?php //echo $username; echo $password;?></div>

     <ul>
         <li><a href="Forum/new_topic.php">Create a new topic</a></li>
         <li><a href="Forum/main_forum.php">Go to the main forum</a></li>
     </ul>
</div>
</body>
</html>