<?php
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=albin", "root", "");

        $username = "Albin";
        $password = password_hash("mypassword", PASSWORD_DEFAULT);
        // $email = "test@gmail.com";

        $sql = "INSERT INTO users(username,password) VALUES ('$username', '$password')";

        // $sql= "ALTER table users ADD email VARCHAR(255)";
        // $sql = "ALTER table users DROP COLUMN email";
        // $sql = "DROP TABLE PRODUCTS";


        $pdo->exec($sql);

        echo "New record created succssefully";
    }catch(DOExection $e){
        echo $e->getMessage();
    }




?>