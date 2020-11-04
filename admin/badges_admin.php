<!DOCTYPE html>
<html>
    <head>
        <?php 
            require "../includes/BDDConnection.php";
            require "../includes/header.php" ;
            require "../class/class_badge.php";
        ?>
    </head>
    <body>
        <!--====================================
        /       Affichage des utilisateurs       /
        =====================================-->

        <div class="container">
                <div class="float-md-left"><a href="admin_panel.php"><button name="retour" class="btn btn-primary">Retour</button></a></div>
                <div class="float-md-right"><a href="ajout_badge.php"><button name="retour" class="btn btn-primary">Ajouter</button></a></div>


        <table class="table">
            <thead>
                <tr>
                <th scope="col">Nom Badge</th>
                <th scope="col">Desc Badge</th>
                <th scope="col">Nom image</th>
                <th scope="col">Modifier</th>
                <th scope="col">Supprimer</th>
                </tr>
            </thead>
            <tbody>
            <?php
                //roles = admin, member, user
                $o=new badge("","","","","","","","","","","","","","","");
                $req=$o->tslesbadges($bdd);
                foreach($req as $unbadge){
                $id_badge=$unbadge['id_badge'];
            ?>
                <tr>
                <th scope="row"><?php echo $unbadge['nom_badge']; ?></th>
                    <td><?php echo $unbadge['description_badge']; ?></td>
                    <td><?php echo $unbadge['nom_image_badge']; ?></td>
                    
                    <form action="modif_badge.php" method="post">
                        <input name="idbadge" type="hidden" value="<?php echo $id_badge?>">
                        <td><input methode="POST" type="submit" value="Modifier" name="modifierb"></td>                                    
                    </form>
                    <form action="../class/traitement_badge.php" method="post">
                        <input name="idbadge" type="hidden" value="<?php echo $id_badge?>">
                        <td><input methode="POST" type="submit" value="Supprimer" name="supprb"></td>                                    
                    </form>
                </tr>
                <?php
                }
            ?>
            </tbody>
            
        </table>
        </div>

      
        <?php
            require "../includes/import-js.php" ;
        ?>
    </body>
</html>