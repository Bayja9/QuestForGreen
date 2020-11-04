<!DOCTYPE html>
<html>
    <head>
        <?php 
            include "../includes/BDDConnection.php";
            require "../includes/header.php" ;
            require "../class/class_utilisateur.php";
        ?>
    </head>
    <body>
        <!--====================================
        /       Affichage des utilisateurs       /
        =====================================-->

        <div class="container">
                <div class="float-md-left"><a href="admin_panel.php"><button name="retour" class="btn btn-primary">Retour</button></a></div>
                


        <table class="table">
            <thead>
                <tr>
                <th scope="col">Pseudo</th>
                <th scope="col">e-mail</th>
                <th scope="col">Niveaux</th>
                <th scope="col">XP</th>
                <th scope="col">Points</th>
                <th scope="col">Rang</th>
                <th scope="col">Image</th>
                <th scope="col">Modifier</th>
                <th scope="col">Supprimer</th>
                </tr>
            </thead>
            <tbody>
            <?php
                //roles = admin, member, user
                $o=new utilisateur("","","","","","","","","");
                $req=$o->tslesutilisateurs($bdd);
                foreach($req as $unutilisateur){
                $id_util=$unutilisateur['id_utilisateur'];
            ?>
                <tr>
                <th scope="row"><?php echo $unutilisateur['username_utilisateur']; ?></th>
                    <td><?php echo $unutilisateur['mail_utilisateur']; ?></td>
                    <td><?php echo $unutilisateur['niv']; ?></td>
                    <td><?php echo $unutilisateur['xp_utilisateur']; ?></td>
                    <td><?php echo $unutilisateur['points_utilisateur']; ?></td>
                    <td><?php if ($unutilisateur['etat_utilisateur']==2) {
                                                          echo "admin";
                                                        }
                                                        else {
                                                          echo "membre";
                                                        } ?></td>
                    <td><?php echo $unutilisateur['nom_image']; ?></td>
                    <form action="modif_util.php" method="post">
                        <input name="idutil" type="hidden" value="<?php echo $unutilisateur['id_utilisateur']?>">
                        <td><input methode="POST" type="submit" value="Modifier" name="modifieru"></td>                                    
                    </form>
                    <form action="../class/traitement_utilisateur.php" method="post">
                        <input name="idutil" type="hidden" value="<?php echo $unutilisateur['id_utilisateur']?>">
                        <td><input methode="POST" type="submit" value="Supprimer" name="suppru"></td>                                    
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