<?php
include 'config.php';

if (!isset($_POST['versturen']) && !isset($_POST['mail'])){
  header("location: ../index.php");
  exit;
}
$to = $_POST['mail'];
$subject = 'Wachtwoord resetten';
$message = 'Hier kunt u uw wachtwoord resetten http://localhost/School/test%20-%20pdo/loginsys_PDO/resetpwd.php' . '?mail=' . $to;
$headers = "From: partijvoordeimmigranten@gmail.com\r\n";

$stmt = $pdo -> prepare("SELECT user_username, user_mail FROM users WHERE user_mail = :mail OR user_username = :username");
$stmt -> bindParam(":mail", $to, PDO::PARAM_STR);
$stmt -> bindParam(":username", $username, PDO::PARAM_STR);
$stmt -> execute();

$user = $stmt -> fetch(PDO::FETCH_ASSOC);


if (!$user){
  header("location: ../login.php?error=gebruikersnaambestaatniet");
}else {
if (mail($to, $subject, $message, $headers)) {
   header("location: ../login.php?succes");
   exit;
} else {
  header("location: ../login.php?error=verkeerdemail");
  exit;
}
}
