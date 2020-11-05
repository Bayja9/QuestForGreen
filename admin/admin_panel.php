<!DOCTYPE html>
<html>
    <head>
        <?php 
            require "../includes/header.php" ;
            require "../class/class_utilisateur.php"; 
            
        ?>

    <style>
        body {
    color:black;
    background-color:white;
    background-image:url(../resources/img/fond_admin.jpg);
    }
    </style>


    </head>
    <body>
        <!--====================================
        /       Affichage du panel admin       /
        =====================================-->
        
        <div class="container">
        <div class="d-flex justify-content-center">
            <div class="btn-group btn-group-justified" role="group" aria-label="...">
                <a href="utilisateurs_admin.php" class="btn btn-primary" title="utilisateurs" role="button" name="util">Utilisateurs</a>
                <a href="quetes_admin.php" class="btn btn-primary" title="quetes" role="button"name="quetes">Quêtes</a>
                <a href="badges_admin.php" class="btn btn-primary" title="badges" role="button"name="badges">Badges</a>
            </div>
        </div>    
        </div>

      
        <?php
            require "../includes/import-js.php" ;
        ?>
    </body>
</html>