<?php

session_start();

require_once 'config.php';

include 'top.php';


if (isset($_POST['login'])) {
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $email = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $passwordPoging = !empty($_POST['pass']) ? trim($_POST['pass']) : null;

    #Query  voor het selecteren

    $stmt = $pdo -> prepare("SELECT id, user_username, user_password, user_mail, is_admin, is_blocked FROM users WHERE user_username = :username OR user_mail = :mail");
    $stmt -> bindParam(":username", $username, PDO::PARAM_STR);
    $stmt -> bindParam(":mail", $email, PDO::PARAM_STR);
    $stmt -> execute();

    $user = $stmt -> fetch(PDO::FETCH_ASSOC);
    #Checkt of de gebruikersnaam in de database is
    if ($user === false) {
        header('Location: ../login.php?error=password/username_incorect');
    } else {
        #Checkt of de wachtwoorden hetzelfde zijn
        if (password_verify($passwordPoging, $user['user_password'])) {
            if ($user['is_admin'] === "1" && $user['is_blocked'] === "1" || $user['is_admin'] === "1" && $user['is_blocked'] === "0") {
                $_SESSION["username"] = $user['user_username'];
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['logged_in'] = time();
                $_SESSION['is_admin'] = $user['is_admin'];

                header('Location: ../dashboard.php');
                exit;
            } else if ($user['is_blocked'] === "1") {

                header('Location: ../login.php?error=blocked');
                exit;
            } else if ($user['is_blocked'] === "0") {
                $_SESSION["username"] = $username;
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['logged_in'] = time();
                header('Location: ../quiz.php');
                exit;
            }
        } else {
            header('Location: ../login.php?error=password/username_incorect2');
        }
    }
}
