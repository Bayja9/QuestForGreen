<!DOCTYPE html>
<html>
    <head>
        <?php 
            include "../includes/BDDConnection.php";
            require "../includes/header.php" ;
            require "../class/class_quetes.php";
        ?>
    </head>
    <body>
        <!--====================================
        /       Affichage des utilisateurs       /
        =====================================-->

        <div class="container">
                <div class="float-md-left"><a href="admin_panel.php"><button name="retour" class="btn btn-primary">Retour</button></a></div>
                <div class="float-md-right"><a href="ajout_quetes.php"><button name="ajouter" class="btn btn-primary">Ajouter</button></a></div>
                


        <table class="table">
            <thead>
                <tr>
                <th scope="col">Nom quête</th>
                <th scope="col">Description</th>
                <th scope="col">Type quête</th>
                <th scope="col">Date fin</th>
                <th scope="col">Difficulté</th>
                <th scope="col">Durée</th>
                <th scope="col">Progression</th>
                <th scope="col">Etat</th>
                <th scope="col">Modifier</th>
                <th scope="col">Supprimer</th>
                </tr>
            </thead>
            <tbody>
            <?php
                //roles = admin, member, user
                $o=new quetes("","","","","","","","","","","");
                $req=$o->tslesquetes($bdd);
                foreach($req as $unequete){
                $id_quetes=$unequete['id_quetes'];
                
            ?>
                <tr>
                <th scope="row"><?php echo $unequete['nom_quetes']; ?></th>
                    <td><?php echo $unequete['description_quetes']; ?></td>
                    <td><?php echo $unequete['id_type_quetes']; ?></td>
                    <td><?php echo $unequete['date_fin_quetes']; ?></td>
                    <td><?php echo $unequete['difficulte_quetes']; ?></td>
                    <td><?php echo $unequete['periode_quetes']; ?></td>
                    <td><?php echo $unequete['amount_quetes']; ?></td>
                    <td><?php if ($unequete['etat_quetes']==0) {
                                                          echo "En cours";
                                                        }
                                                        else {
                                                          echo "Terminée";
                                                        } ?></td>
                    <form action="modif_quetes.php" method="post">
                        <input name="id_quetes" type="hidden" value="<?php echo $unequete['id_quetes']?>">
                        <td><input methode="POST" type="submit" value="Modifier" name="modifierq"></td>                                    
                    </form>
                    <form action="../class/traitement_quetes.php" method="post">
                        <input name="id_quetes" type="hidden" value="<?php echo $unequete['id_quetes']?>">
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