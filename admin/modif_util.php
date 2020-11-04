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
                $o=new utilisateur((integer)$id_util,"","","","","","");
                $unutilisateur=$o->affiche_utilisateur_total($o,$bdd);
                $_SESSION['id_utilisateur']=(int)$id_util;
            ?>
        <form action="../class/traitement_utilisateur.php" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Pseudo</label>
            <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $unutilisateur['username_utilisateur']?>">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">e-mail</label>
            <input type="mail" class="form-control" id="exampleInputPassword1" value="<?php echo $unutilisateur['mail_utilisateur']?>">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Niveaux</label>
            <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $unutilisateur['niv']?>">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">xp</label>
            <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $unutilisateur['xp_utilisateur']?>">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">points</label>
            <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $unutilisateur['points_utilisateur']?>">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">rang</label>
            <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $unutilisateur['etat_utilisateur']?>">
        </div>
        <button type="submit" class="btn btn-primary" value="Modifier" name="modifieru">Modifier</button>
        </form>
        </div>
      
        <?php
                
            require "../includes/import-js.php" ;
        ?>
    </body>
</html>