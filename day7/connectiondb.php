<?php
$host = "localhost";
$db = "Albin";
$user = "root";
$pass = "";


try{
    $conn = new PDO("mysql:host=$host;" ,$user ,$pass);
    $sql = "CREATE TABLE users (id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(30) NOT NULL,
            password VARCHAR(30) NOT NULL)";

    echo "Table created successfully";
}catch(Exception $e){

    echo "Not Connected";
}

?>