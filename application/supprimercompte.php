<?php
session_start();
require_once '../resource/config.php';
try {
    $pdo = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$req = $pdo->prepare("DELETE FROM `user` WHERE id=:id");
$req->bindParam((':id'), $_POST['id']);
$req->execute();
header('Location: ../vue/gerercompte.php');
