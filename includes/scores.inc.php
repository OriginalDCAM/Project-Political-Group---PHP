<?php
include 'top.php';

include 'login.inc.php';
if(!isset($_SESSION['user_id'])){
    header('Location: ../index.php');
    exit;
}
$antwoord = $_GET['anwser'];
$id = $_GET['sleutel'];

if ($antwoord === "eens"){
  $stmt = $pdo->prepare("UPDATE stellingen SET eens = eens + 1 WHERE stelling_id = :id");
  $stmt -> bindParam(":id", $id, PDO::PARAM_STR);
  $stmt->execute();

header("Location: ../bedankt.php");
exit;
}else if ($antwoord === "oneens"){
  $stmt = $pdo->prepare("UPDATE stellingen SET oneens = oneens + 1 WHERE stelling_id = :id");
  $stmt -> bindParam(":id", $id, PDO::PARAM_STR);
  $stmt->execute();

  header("Location: ../bedankt.php");
}
