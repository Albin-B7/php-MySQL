<?php
    include_once('config.php');

    if(isset($_POST['submit'])){
        $emri = $_POST['emri'];
        $username = $_POST['username'];
        $email = $_POST['email'];

        $tempPass = $_POST['password'];
        $passord = password_hash($tempPass, PASSWORD_DEFAULT);

        $tempConfirm = $_POST['confirm_password'];
        $confirm_passord = password_hash($tempConfirm, PASSWORD_DEFAULT);

        if(empty($emri) || empty($username) || empty($email) || empty($passord) || empty($confirm_passord)){
            echo "ou have not filled in all the fields.";
        }else{
            $sql = "INSERT INTO users(emri, username, email, password, confirm_password) values (:emri, :username, :email, :password, :confirm_password)";

            $insertsql = $conn->prepare($sql);

            $insertsql->bindeParam(':emri', $emri);
            $insertsql->bindeParam(':username', $username);
            $insertsql->bindeParam(':email', $email);
            $insertsql->bindeParam(':password', $passord);
            $insertsql->bindeParam(':confirm_password', $confirm_passord);

            $insertsql->execute();

            header("Location: login.php");
        }
    }


?>