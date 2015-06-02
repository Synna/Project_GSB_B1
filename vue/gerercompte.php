<?php
session_start();
require_once '../resource/config.php';
try {
    $pdo = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="../css/action.css" rel="stylesheet" />
        <title>Accueil Admin</title>
    </head>
    <body>
        <header>
            <a href="../vue/accueiladmin.php"><img src="../resource/gsb.png" alt="Logo GSB" height="150"/></a>
            <h1>Gérer les Comptes utilisateurs</h1>
        </header>
        <div id="corps">
            <div>
                <form action="../application/ajoutecompte.php" method="post">
                    <fieldset>
                    <legend>Ajouter un compte</legend>
                    Identifiant : <input type="text" name="login"><br>
                    Password : <input type="password" name="pass"><br />
                    Nom : <input type="text" name="nom"><br>
                    Prenom : <input type="text" name="prenom"><br>
                    Poste : <input type="radio" name="poste" value="Employe" checked>Employe
                    <input type="radio" name="poste" value="Admin">Admin<br><br>
                    <input type="submit" name="Ajouter" value="Ajouter">
                    </fieldset>
                </form>
            </div>
            <br><br><br>
            <div>supprimer compte
                <form method="post" action="../application/supprimercompte.php">
                    <fieldset>
                    <legend>Supprimer un compte</legend>
                    Login : 
                    <?php
                    $req = $pdo->prepare("SELECT id,login FROM user");
                    $req->execute();
                    echo "<SELECT NAME='id' onChange='FocusObjet()'>";
                    while ($donnees = $req->fetch()) {
                        echo "<OPTION VALUE='" . $donnees["id"] . "'>" . $donnees['login'] . "</OPTION>\n";
                    }
                    echo "</SELECT>";
                    ?>
                    <br /><br/><input type="submit" value="Supprimer un compte">
                    </fieldset>
                </form>
            </div>
        </div>
        <br><br><br><br>
        <footer>
            <hr />
            Copyright © 2015 - Massive Technologies - Tous droits réservés.
            <hr />
        </footer>
    </body>
</html>