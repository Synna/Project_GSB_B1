<?php
session_start();
require_once '../resource/config.php';
try {
    $pdo = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$req = $pdo->prepare("INSERT INTO `compterendu` (`titre`, `texte`, `auteur`, `status`) VALUES (:titre, :texte, :auteur, 'nonarchives')");
$req->bindParam((':titre'), $_POST['titre']);
$req->bindParam((':texte'), $_POST['rendu']);
$req->bindParam((':auteur'), $_SESSION['id']);
$req->execute();
header('Location: ../application/ajoutecompterendu.php');