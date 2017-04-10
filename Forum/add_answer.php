
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Answer Added!</title>
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
<?php

include_once("dbConnect.php");
$tbl_name="fanswer";
$db_name="myforum";

// Get value of id that sent from hidden field
$id=$_POST['id'];

// Find highest answer number.
$sql="SELECT MAX(a_id) AS Maxa_id FROM fanswer WHERE question_id='$id'";
$result=mysqli_query($db,$sql);
$rows=mysqli_fetch_array($result);

// add + 1 to highest answer number and keep it in variable name "$Max_id". if there no answer yet set it = 1
if ($rows) {
    $Max_id = $rows['Maxa_id']+1;
}
else {
    $Max_id = 1;
}

// get values that sent from form
$a_name=$_POST['a_name'];
$a_email=$_POST['a_email'];
$a_answer=$_POST['a_answer'];

$a_datetime=date("d/m/y H:i:s"); // create date and time
mysqli_select_db($db,"myforum")or die("cannot select DB");
// Insert answer
$test="INSERT INTO fanswer(question_id, a_id, a_name, a_email, a_answer, a_datetime)VALUES('$id', '$Max_id', '$a_name', '$a_email', '$a_answer', '$a_datetime')";
$result2=mysqli_query($db,$test);

if($result2){
    echo "Successful<BR>";
    echo "<a href='view_topic.php?id=".$id."'>View your answer</a>";

// If added new answer, add value +1 in reply column
    $tbl_name2="fquestions";
    $sql3="UPDATE fquestions SET reply='$Max_id' WHERE id='$id'";
    $result3=mysqli_query($db,$sql3);
}
else {
    echo "ERROR";
}

// Close connection
?>
