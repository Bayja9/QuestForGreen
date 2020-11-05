<!DOCTYPE html>
<html>
    <head>
        <?php 
            require "../includes/header.php" ;
            require "../class/class_utilisateur.php"; 
            
        ?>

<div class style="background-image: url('https://cdn.discordapp.com/attachments/651869505370193927/773944508911845426/environmental-protection-683437.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
    </head>
    <body>
        <!--====================================
        /       Affichage du panel admin       /
        =====================================-->
        
        <div class="container">
                
                <a href="utilisateurs_admin.php"><button name="util" class="btn btn-primary">Utilisateurs</button></a>
                <a href="quetes_admin.php"><button name="quetes" class="btn btn-primary">Quêtes</button></a>
                <a href="badges_admin.php"><button name="badges" class="btn btn-primary">Badges</button></a>
        </div>

      
        <?php
            require "../includes/import-js.php" ;
        ?>
    </body>
</html>