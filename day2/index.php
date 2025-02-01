<?php

$num = 5;
if($num < 0){
    echo "$num is less than 0";
}else{
    echo "$num is bigger than 0 <br>";
}

if($num < 0){
    echo "number is negative <br>";
}elseif($num == 0){
    echo "number is 0 <br>";
}else{
    echo "number is positive <br>";
}

$age = 15 ;
if(($age > 12) && ($age < 20)){
    echo "you are a teenager <br>";
}

$a = 20;
$b = 10;

if($a == $b){
    echo "the are equal <br>";
}else{
    echo "they are not equal <br>";
}

$day = "Monday";
switch($day){
    case 'Monday':
    echo "Start of the week <br>";
    break;
    case 'Tuesday':
    echo "Lets get through this week <br>";
    break;
    case 'Wensday':
    echo "The middle of the week <br>";
    break;
    case 'Thursday':
    echo "Almost there <br>";
    break;
    case 'Friday':
    echo "Weekend is here! <br>";
    break;
    default:
    echo "invalid day <br>";
    break;
}


#while loop

$x = 1;
while($x <= 5){
    echo "the number is: $x <br>";
    $x++;
}

#dual loop

$y = 0;
do{
    echo " the number is $y <br>";
    $y++;
}while($y <= 5);


?>