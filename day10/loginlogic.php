<?php
    require 'config.php';

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(empty($username) || emty($password)){
            echo "Fill all the fields!";
            header("refresh:2 url=signin.php");
        }else(
            $sql = "SELECT * FROM users WHERE username = :username";
            $insertSql = conn->prepare($sql);
            $insertSql->bindParam(':username', $username);
            $insertSql->execute();

            if($insertSql->rowCount()> 0){
                $data = $insertSql->fetch();
                if(password_verify($password, $data['password'])){
                    $_SESSION['username']= $data['username'];
                    header("Location:dashboard.php");
                }
            }else{
                echo "User not found!";
            }
        )
    }



?>