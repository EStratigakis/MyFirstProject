<!DOCTYPE html>


<html>
<head>

</head>
<body>
<p>
    <?php
    echo "Hello World";
    $myname = "Frodo Baggins";
    $myage = 17;
    echo "My name is " . $myname . "and I am " . $myage;

    if ($myage >= 16){
        print "You can buy specs!";
        if ($myage >= 18){
            print "You can buy mugs";
            if ($myage >= 21){
                print "You can buy sausage rolls";
            }
        }
    }
    else {
        print "You cannot buy anything!";
    }

   ?>
</body>
</html>