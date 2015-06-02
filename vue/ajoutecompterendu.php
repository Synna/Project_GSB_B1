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
        <link href="../css/action.css" rel="stylesheet" />
        <title>Creé un compte rendu</title>
    </head>
    <body>
        <header>
            <h1>Creé un compte rendu</h1>
            <a href="../vue/accueilvisiteur.php"><img src="../resource/gsb.png" alt="Logo GSB" height="150"/></a>
        </header>
        <div id="rendu">
            <form action="../application/ajoutecompterendu.php" method="post">
                    <fieldset>
                        <legend>Ajoute un compte rendu</legend>
                        <br><br><b>Titre du compte rendu:</b>
                        <input type="text" name="titre" required="required"/><br><br>
                        <b>Corps du compte rendu :</b></td>
                            <textarea value="" name="rendu"></textarea><br><br><br>
                        <input type="submit" value="Ajouté" class="Bouton" id="bouton"/>
                        <input type="reset" class="Bouton Effacer" value="Effacer" id="bouton"/>
                    </fieldset>
            </form>
        </div>
        <footer>
            <hr />
            Copyright © 2015 - Massive Technologies - Tous droits réservés.
            <hr />
        </footer>
    </body>
</html>