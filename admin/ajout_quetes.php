<!DOCTYPE html>
<html>
    <head>
        <?php 
            require "../includes/header.php" ;
            require "../class/class_quetes.php"; 
            $typequete=new typequete("","");
            $req2 = $typequete->afftypequete($bdd);
        ?>
    </head>
    <body>
        <!--==========================
        /       Ajout d'un quêtes     /
        ===========================-->
        <div class="container">
        <a href="quetes_admin.php"><button name="retour" class="btn btn-primary">Retour</button></a>

        <form action="../class/traitement_quetes.php" method="post">
        <div class="form-group">
            <label for="nom_quetes">Nom Quêtes</label>
            <input name="nom_quetes" type="text" class="form-control" id="nom_quetes">
        </div>
        <div class="form-group">
            <label>Description Quêtes</label>
            <input name="description_quetes" type="text" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="form-group">
            <input name="date_fin_quetes" type="hidden" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="form-group">
            <label>Difficulté</label>
            <input name="difficulte_quetes" type="number" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="form-group">
        <label>Type quete</label>
            <select name="periode_quetes" id="select" class="form-control">
                        <?php while($row=$req2->fetch())
                        {
                        ?>
                        <option ><?php echo $row['titre_type_quetes']?></option>
                        <?php
                        }
                        ?>
                      </select>
        </div>
        <div class="form-group">
            <label>Progression</label>
            <input name="amount_quetes" type="number" class="form-control" id="exampleInputEmail1">
        </div>
        
        
        <button type="submit" class="btn btn-primary" value="ajouter" name="enregistrerq">Ajouter</button>
        </form>
        </div>
      
        <?php                
            require "../includes/import-js.php";
        ?>
    </body>
</html>