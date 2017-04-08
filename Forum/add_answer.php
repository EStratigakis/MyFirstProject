<?php

include ("C:\Users\strpa\Documents\GitHub\MyFirstProject\dbConnect.php");
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

<head>
    <meta charset="UTF-8">
    <title>Answer Added!</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="assets/CSS/unsemantic-grid-responsive-tablet.css">
</head>
