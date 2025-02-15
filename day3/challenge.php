<?php

function modulo($n){
    if(($n % 2) == 0){
        return "$n is fully devisible bt 2";
    }
    else{
        return "$n is NOT fully devisible bt 2";
    }
}

echo (modulo(5). "<br>");
echo (modulo(8). "<br>");
echo (modulo(10). "<br>");
echo (modulo(7). "<br>");
echo (modulo(3). "<br>");




?>