<?php
$host = "localhost";
$user = "root";
$pass = "";


try{
    $conn = new PDO("mysql:host=$host;" ,$user ,$pass);

    $sql = "CREATE DATABASE Albin";

    $conn->exec($sql);

    echo "Database Created";
}catch(Exception $e){

    echo "Not Connected";
}

?>