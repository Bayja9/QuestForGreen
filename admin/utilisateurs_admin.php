<!DOCTYPE html>
<html>
    <head>
        <?php 
            require "../includes/header.php" ;
            require "../class/class_utilisateur.php";
        ?>
    </head>
    <body>
        <!--====================================
        /       Affichage des utilisateurs       /
        =====================================-->

        <div class="container">
                <a href="admin_panel.php"><button name="retour" class="btn btn-primary">Retour</button></a>
        


        <table class="table">
            <thead>
                <tr>
                <th scope="col">Pseudo</th>
                <th scope="col">e-mail</th>
                <th scope="col">XP</th>
                <th scope="col">Points</th>
                <th scope="col">Rang</th>
                <th scope="col">Modifier</th>
                <th scope="col">Supprimer</th>
                </tr>
            </thead>
            <tbody>
            <?php
                //roles = admin, member, user
                $o=new utilisateur("","","","","","","");
                $req=$o->tslesutilisateurs($bdd);
                foreach($req as $unutilisateur){
                $id_util=$unutilisateur['id_utilisateur'];
            ?>
                <tr>
                <th scope="row"><?php echo $unutilisateur['username_utilisateur']; ?></th>
                    <td><?php echo $unutilisateur['mail_utilisateur']; ?></td>
                    <td><?php echo $unutilisateur['xp_utilisateur']; ?></td>
                    <td><?php echo $unutilisateur['points_utilisateur']; ?></td>
                    <td><?php if ($unutilisateur['etat_utilisateur']==2) {
                                                          echo "admin";
                                                        }
                                                        else {
                                                          echo "member";
                                                        } ?></td>
                    <td><?php echo "<a href='modif_util_admin.php?idutil=$id_util'><button class='item' data-toggle='tooltip' data-placement='top' title='Details/Modifier'>"?></td>
                    <form action="../class/traitement_utilisateur.php">
                        <td><?php echo "<a href='../class/traitement_utilisateur.php?idutil=$id_util&type=supprimerutil'><button class='item' data-toggle='tooltip' data-placement='top' title='Details/Modifier'>"?></td>                                    
                    </form>
                </tr>
            </tbody>
            <?php
                }
            ?>
        </table>
        </div>

      
        <?php
            require "../includes/import-js.php" ;
        ?>
    </body>
</html>