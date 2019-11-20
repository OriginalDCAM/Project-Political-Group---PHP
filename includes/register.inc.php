<?php

session_start();

require_once 'config.php';

include 'top.php';

if(isset($_POST['register'])){
    $username= !empty($_POST['usernameReg']) ? trim($_POST['usernameReg']) : null;
    $email= !empty($_POST['emailReg'])? trim($_POST['emailReg']) : null;
    $password= !empty($_POST['passwordReg'])? trim($_POST['passwordReg']) : null;
    $passwordRep= !empty($_POST['passwordRegRep'])? trim($_POST['passwordRegRep']) : null;

    //Kijkt of wel alle velden zijn gevuld in het form
    if (empty($username) || empty($email) || empty($password) || empty($passwordRep)) {
        header("location: ../register.php?error=emptyfields&uid=". $username. "&mail=". $email);
        exit;
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
        header("location: ../register.php?error=invalidemail&uid");
        exit;
    }
    //Kijkt of het wel echt een email is
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL))  {
        header("location: ../register.php?error=invalidemail&uid=". $username);
        exit;
    }
    //Kijkt of er wel een geldige gebruikersnaam wordt ingevoerd
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username))  {
        header("location: ../register.php?error=invaliduidl&mail=". $email);
        exit;
    }
    //Kijkt of het wachtwoord hetzelfde is
    else if ($password !== $passwordRep){
        //Zo niet dan gaat hij terug naar de signup page
        header("location: ../register.php?error=passwordcheck&uid=". $username. "&mail=". $email);
        exit;
    }else {
      $stmt = $pdo->prepare("INSERT INTO users(user_mail, user_username, user_password) VALUES (:email,:username,:password)");
      $stmt->bindParam("username", $username, PDO::PARAM_STR);
      $stmt->bindParam("email", $email, PDO::PARAM_STR);
      $enc_password = password_hash($password, PASSWORD_BCRYPT);
      $stmt->bindParam("password", $enc_password, PDO::PARAM_STR);
      $stmt->execute();

    header("location:../login.php");
    exit;
    }

    }
