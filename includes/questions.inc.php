<?php
include "login.inc.php";



if(!isset($_SESSION['user_id']) && !isset($_POST['submit'])){
    header('Location: logout.php');
    exit;
}
$vraag = $_POST['stelling'];

$stmt = $pdo->prepare("INSERT INTO stellingen( vraag) VALUES (:vraag)");
$stmt->bindParam("vraag", $vraag, PDO::PARAM_STR);
$stmt->execute();



?>
