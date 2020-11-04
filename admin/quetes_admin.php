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
                <th scope="col">Nom quête</th>
                <th scope="col">Description</th>
                <th scope="col">Date fin</th>
                <th scope="col">Difficulté</th>
                <th scope="col">Durée</th>
                <th scope="col">Progression</th>
                <th scope="col">Etat</th>
                <th scope="col">Ajouter</th>
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
                    <form action="ajout_quetes.php" method="post">
                        <input name="idutil" type="hidden" value="<?php echo $unutilisateur['id_utilisateur']?>">
                        <td><input methode="POST" type="submit" value="Modifier" name="enregisterq"></td>                                    
                    </form>
                    <form action="modif_util.php" method="post">
                        <input name="idutil" type="hidden" value="<?php echo $unutilisateur['id_utilisateur']?>">
                        <td><input methode="POST" type="submit" value="Modifier" name="modifierq"></td>                                    
                    </form>
                    <form action="../class/traitement_utilisateur.php" method="post">
                        <input name="idutil" type="hidden" value="<?php echo $unutilisateur['id_utilisateur']?>">
                        <td><input methode="POST" type="submit" value="Supprimer" name="supprq"></td>                                    
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