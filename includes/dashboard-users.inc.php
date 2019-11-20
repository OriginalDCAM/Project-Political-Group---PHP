<?php
include "config.php";


if (!isset($_POST['versturen'])){
$key = $_GET['sleutel'];
}
$manier = $_GET['manier'];

if ($manier === "is_admin" || $manier === "is_blocked"){
$stmt = $pdo->prepare("UPDATE users SET $manier = TRUE WHERE id=:sleutel");
$stmt->bindParam("sleutel", $key , PDO::PARAM_STR);
$stmt->execute();

header("Location: ../dashboard-users.php?manier=$manier");
exit;
}else  if ($manier === "verwijderen"){
$stmt = $pdo->prepare("DELETE FROM users WHERE id = :sleutel");
$stmt->bindParam("sleutel", $key , PDO::PARAM_STR);
$stmt->execute();

header("Location: ../dashboard-users.php?manier=$manier");
exit;
}else if ($manier === "is_unblocked"){
   $stmt = $pdo->prepare("UPDATE users SET is_blocked = FALSE WHERE id=:sleutel");
$stmt->bindParam("sleutel", $key , PDO::PARAM_STR);
$stmt->execute();

header("Location: ../dashboard-users.php?manier=$manier");
exit;
}else if ($manier === "is_gast"){
$stmt = $pdo->prepare("UPDATE users SET is_admin = FALSE WHERE id=:sleutel");
$stmt->bindParam("sleutel", $key , PDO::PARAM_STR);
$stmt->execute();

header("Location: ../dashboard-users.php?manier=$manier");
exit;
}else if ($manier === "changepass"){
  $password= !empty($_POST['passwordReg'])? trim($_POST['passwordReg']) : null;
  $passwordRep= !empty($_POST['passwordRegRep'])? trim($_POST['passwordRegRep']) : null;
  if ($password !== $passwordRep){
     header("location: ../login.php?error");
     exit;
 }$mail = $_GET['mail'];
  $stmt = $pdo->prepare("UPDATE users SET user_password = :pass WHERE user_mail = :mail");
  $enc_password = password_hash($password, PASSWORD_BCRYPT);
  $stmt->bindParam("pass", $enc_password , PDO::PARAM_STR);
    $stmt->bindParam("mail", $mail , PDO::PARAM_STR);
  $stmt->execute();
   header("Location: ../login.php?succes");
  exit;
}





?>
