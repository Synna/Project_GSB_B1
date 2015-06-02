<?php
session_start();
require_once '../resource/config.php';
try {
    $pdo = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$pass = md5($_POST['pass']);
$req = $pdo->prepare("INSERT INTO `user` (`login`, `pass`, `nom`, `prenom`, `poste`) VALUES (:login, :pass, :nom, :prenom, :poste)");
$req->bindParam((':login'), $_POST['login']);
$req->bindParam((':pass'), $pass);
$req->bindParam((':nom'), $_POST['nom']);
$req->bindParam((':prenom'), $_POST['prenom']);
$req->bindParam((':poste'), $_POST['poste']);
$req->execute();
header('Location: ../vue/gerercompte.php');
