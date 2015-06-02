<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/index.css" rel="stylesheet" />
        <title>Connexion</title>
    </head>
    <body>
        <header>
            <h1>Gestion de compte rendu</h1>
            <img src="resource/gsb.png" alt="Logo GSB" height="150"/>
        </header>
        <div>
            <form action="application/connexion.php" method="post">
                <div id="connexion">
                    <fieldset>
                        <legend>Veuillez entrer ci-dessous vos identifiants:</legend>
                            <br><br><b>Nom d'utilisateur :</b>
                            <input type="text" name="login" required="required"/><br><br>
                            <b>Mot de passe :</b></td>
                            <input type="password" name="password" required="required"/><br><br><br>
                            <input type="submit" value="Valider" class="Bouton" id="bouton"/>
                            <input type="reset" class="Bouton Effacer" value="Effacer" id="bouton"/>
                    </fieldset>
                </div>
            </form>
            <br><br><br> 
        </div>
        <footer>
            <hr />
            Copyright © 2015 - Massive Technologies - Tous droits réservés.
            <hr />
        </footer>
    </body>
</html>
