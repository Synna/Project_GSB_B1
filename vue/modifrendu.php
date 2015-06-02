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
        <script type="text/javascript" src="../resource/tinymce/js/tinymce/tinymce.min.js"></script>
        <script type="text/javascript">
            tinymce.init({
                selector: "textarea",
                theme: "modern",
                plugins: [
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table contextmenu directionality",
                    "emoticons template paste textcolor colorpicker textpattern"
                ],
                toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
                toolbar2: "print preview media | forecolor backcolor emoticons",
                image_advtab: true,
                templates: [
                    {title: 'Test template 1', content: 'Test 1'},
                    {title: 'Test template 2', content: 'Test 2'}
                ]
            });
        </script>
        <meta charset="UTF-8">
        <link href="../css/rendu.css" rel="stylesheet" />
        <title>Modifier un compte rendu</title>
    </head>
    <body>
        <header>
            <h1 class="titre">Modifier un compte rendu</h1>
            <a href="../vue/accueilvisiteur.php"><img src="../resource/gsb.png" alt="Logo GSB" height="150"/></a>
        </header>
        <div id="rendu">
            <form method="post" action="../vue/modifrendu.php">
                <fieldset>
                    <?php
                    $req = $pdo->prepare("SELECT id,titre FROM compterendu WHERE auteur = :auteur AND status = 'nonarchives'");
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
            <form method="post" action="../application/modifrendu.php">
                    <?php
                    if (isset($_POST['id'])) {
                        echo '<fieldset>';
                        $req = $pdo->prepare("SELECT id, titre, texte, auteur FROM compterendu WHERE id = :id");
                        $req->bindParam((':id'), $_POST['id']);
                        $req->execute();
                        $data = $req->fetch();
                        echo 'Titre: ' . $data['titre'];
                        echo '<br><br><br>';
                        ?>
                        <textarea value="" name="rendu"><?php echo $data['texte']; ?></textarea>
                        <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>"/><?php
                        echo '<br><br><br>';
                        echo '<center><input type="submit" value="Modifier"></center>';
                        echo '</fieldset>';
                    }
                    ?>
            </form>
        </div>
        <footer>
            <hr />
            Copyright © 2015 - Massive Technologies - Tous droits réservés.
            <hr />
        </footer>
    </body>
</html>
