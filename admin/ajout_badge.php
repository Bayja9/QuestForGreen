<!DOCTYPE html>
<html>
    <head>
        <?php 
            require "../includes/header.php" ;
            require "../class/class_badge.php"; 
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
        <!--==========================
        /       Ajout d'un badge     /
        ===========================-->
        <div class="container">
        <a href="badges_admin.php"><button name="retour" class="btn btn-primary">Retour</button></a>
        <div class="p-3 mb-2 bg-dark text-white">
        

        <form action="../class/traitement_badge.php" method="post">
        <div class="form-group ">
            <label for="nom_badge">Nom Badge</label>
            <input name="nom_badge" type="text" class="form-control" id="nom_badge">
        </div>
        <div class="form-group">
            <label>description badge</label>
            <input name="description_badge" type="mail" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="form-group">
            <label>Nom Image badge</label>
            <input name="nom_image_badge" type="mail" class="form-control" id="exampleInputEmail1">
        </div> 
        
        
        <button type="submit" class="btn btn-primary" value="Modifier" name="enregistrerb">Ajouter</button>
        </form>
        </div>
</div>
      
        <?php
                
            require "../includes/import-js.php" ;
        ?>
    </body>
</html>