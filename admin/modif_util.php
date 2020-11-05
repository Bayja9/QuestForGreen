<!DOCTYPE html>
<html>
    <head>
        <?php 
            require "../includes/header.php" ;
            require "../class/class_utilisateur.php"; 
        ?>
    </head>
    <body>
        <!--========================================
        /       Modification d'un utilisateur      /
        =========================================-->
        <div class="container">
        <a href="utilisateurs_admin.php"><button name="retour" class="btn btn-primary">Retour</button></a>
            <?php
                $id_util=$_POST['idutil'];
                $o=new utilisateur((integer)$id_util,"","","","","","","","","");
                $unutilisateur=$o->affiche_utilisateur_total($o,$bdd);
                $_SESSION['id_utilisateur']=(int)$id_util;
            ?>
        <form action="../class/traitement_utilisateur.php" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Pseudo</label>
            <input name="username_utilisateur" type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $unutilisateur['username_utilisateur']?>">
        </div>
        <div class="form-group">
            <label>e-mail</label>
            <input name="mail_utilisateur" type="mail" class="form-control" id="exampleInputEmail1" value="<?php echo $unutilisateur['mail_utilisateur']?>">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Niveaux</label>
            <input name="niv_utilisateur" type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $unutilisateur['niv']?>">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">xp</label>
            <input name="xp_utilisateur" type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $unutilisateur['xp_utilisateur']?>">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">points</label>
            <input name="points_utilisateur" type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $unutilisateur['points_utilisateur']?>">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">rang</label>
            <input name="etat_utilisateur" type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $unutilisateur['etat_utilisateur']?>">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Nom Image</label>
            <input type="file" id="avatar" class="form-control" name="nom_img_utilisateur" accept="image/png, image/jpeg">
        </div>
        <button type="submit" class="btn btn-primary" value="Modifier" name="modifieru">Modifier</button>
        </form>
        </div>
      
        <?php
                
            require "../includes/import-js.php" ;
        ?>
    </body>
</html>