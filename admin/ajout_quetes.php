<!DOCTYPE html>
<html>
    <head>
        <?php 
            require "../includes/header.php" ;
            require "../class/class_quêtes.php"; 
        ?>
    </head>
    <body>
        <!--==========================
        /       Ajout d'un quêtes     /
        ===========================-->
        <div class="container">
        <a href="quetes_admin.php"><button name="retour" class="btn btn-primary">Retour</button></a>

        <form action="../class/traitement_quêtes.php" method="post">
        <div class="form-group">
            <label for="nom_quêtes">Nom Quêtes</label>
            <input name="nom_quêtes" type="text" class="form-control" id="nom_quêtes">
        </div>
        <div class="form-group">
            <label>Description Quêtes</label>
            <input name="description_quêtes" type="mail" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="form-group">
            <label>Nom Image Quêtes</label>
            <input name="nom_image_quêtes" type="mail" class="form-control" id="exampleInputEmail1">
        </div> 
        
        
        <button type="submit" class="btn btn-primary" value="Modifier" name="enregistrerb">Ajouter</button>
        </form>
        </div>
      
        <?php                
            require "../includes/import-js.php";
        ?>
    </body>
</html>