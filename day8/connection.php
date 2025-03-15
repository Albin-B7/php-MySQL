<?php
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=database", "root", "");
        $username = "Albin";
        $password = password_hash("mypassword", PASSWORD_DEFAULT);

        $sql = "INSERT INTO users(username,password) VALUES ("$username", "$password")";
        $pdo->exec($sql);

        echo "New record created succssefully";
    }catch(DOExection $e){
        echo $->getMessage();
    }




?>