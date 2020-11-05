<!DOCTYPE html>
<html>
    <head>
        <?php 
            require "../includes/header.php" ;
            require "../class/class_badge.php"; 
        ?>
    </head>
    <body>
        <!--========================================
        /       Modification d'un badge     /
        =========================================-->
        <div class="container">
        <a href="badges_admin.php"><button name="retour" class="btn btn-primary">Retour</button></a>
            <?php
                $id_badge=$_POST['idbadge'];
                $o=new badge((integer)$id_badge,"","","","","");
                $unbadge=$o->affiche_badge_total($o,$bdd);
                $_SESSION['id_badge']=(int)$id_badge;
            ?>
        <form action="../class/traitement_badge.php" method="post">
        <div class="form-group">
            <label for="nom_badge">Nom Badge</label>
            <input name="nom_badge" type="text" class="form-control" id="nom_badge" value="<?php echo $unbadge['nom_badge']?>">
        </div>
        <div class="form-group">
            <label>description badge</label>
            <input name="description_badge" type="mail" class="form-control" id="exampleInputEmail1" value="<?php echo $unbadge['description_badge']?>">
        </div>
        <div class="form-group">
            <label>Nom Image badge</label>
            <input name="nom_image_badge" type="mail" class="form-control" id="exampleInputEmail1" value="<?php echo $unbadge['nom_image_badge']?>">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Etat Badge ( 0=Activé / 1=Desactivé )</label>
            <input name="etat_badge" type="number" min="0" max="1" class="form-control" id="exampleInputEmail1" value="<?php echo $unbadge['etat_badge']?>">
        </div>
        
        
        <button type="submit" class="btn btn-primary" value="Modifier" name="modifierb">Modifier</button>
        </form>
        </div>
      
        <?php
                
            require "../includes/import-js.php" ;
        ?>
    </body>
</html>