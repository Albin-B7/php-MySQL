<?php

// function helloWorld(){
//     echo "Hello World";
// }

// helloWorld();

// function sum(){
//     $value = 120 + 20;
//     echo $value;
// }

// sum();

function maximum($x, $y){
    if($x > $y){
        return $x;
    }else{
        return $y;
    }
}

$x = 10;
$y = 20;

$test = maximum($x, $y);

echo "The bigeger number was $test"

?>