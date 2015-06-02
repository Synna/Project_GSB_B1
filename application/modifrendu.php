<?php
session_start();
require_once '../resource/config.php';
try {
    $pdo = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="../css/rendu.css" rel="stylesheet" />
        <title>Modifier un compte rendu</title>
    </head>
    <body>
        <header>
            <h1>Modifier un compte rendu</h1>
            <a href="../application/accueilvisiteur.php"><img src="../resource/gsb.png" alt="Logo GSB" height="150"/></a>
        </header>
        <div id="rendu">
            <form method="post" action="visualiserrendu.php">
                <fieldset>
                    <?php
                    $req = $pdo->prepare("SELECT id,titre FROM compterendu WHERE auteur = :auteur");
                    $req->bindParam((':auteur'), $_SESSION['id']);
                    $req->execute();
                    echo "<SELECT NAME='id' onChange='FocusObjet()'>";
                    while ($donnees = $req->fetch()) {
                        echo "<OPTION VALUE='" . $donnees["id"] . "'>" . $donnees['titre'] . "</OPTION>\n";
                    }
                    echo "</SELECT>";
                    ?>
                    <br /><br/><input type="submit" value="Modifier">
                </fieldset>
            </form>
        </div>
        <div id="compterendu">
            <?php
            if (isset($_POST['id'])) {
                $req = $pdo->prepare("SELECT id, titre, texte, auteur FROM compterendu WHERE id = :id");
                $req->bindParam((':id'), $_POST['id']);
                $req->execute();
                $data = $req->fetch();
                echo 'Titre: ' . $data['titre'];
                echo '<br><br><br>';
                echo $data['texte'];
                echo '<br><br><br>';
            }
            ?>
        </div>
        <footer>
            <hr />
            Copyright © 2015 - Massive Technologies - Tous droits réservés.
            <hr />
        </footer>
    </body>
</html>
