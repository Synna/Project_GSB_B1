<?php
session_start();
require_once '../resource/config.php';
try {
    $pdo = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
    $query = $pdo->prepare('SELECT id, login, pass, nom, prenom, poste FROM user WHERE login = :login');
    $query->bindValue(':login', $_POST['login'], PDO::PARAM_STR);
    $query->execute();
    $data = $query->fetch();
    $mdp = md5($_POST['password']);
    if ($data['pass'] == $mdp) {
        $_SESSION['poste'] = $data['poste'];
        $_SESSION['nom'] = $data['nom'];
        $_SESSION['prenom'] = $data['prenom'];
        $_SESSION['id'] = $data['id'];
        $query->CloseCursor();
        if ($_SESSION['poste'] == 'Employe') {
            header('location: ../application/accueilvisiteur.php');
        } else if ($_SESSION['poste'] == 'Admin') {
            header('location: ../application/accueiladmin.php');
        }
    } else {
        $message = 'Le pseudo ou le mot de passe sont incorrect';
        echo $message;
    }
?>