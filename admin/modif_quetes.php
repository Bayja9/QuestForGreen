<!DOCTYPE html>
<html>
    <head>
        <?php 
            require "../includes/header.php" ;
            require "../class/class_quetes.php"; 
            $typequete=new typequete("","");
            $req2 = $typequete->afftypequete($bdd);
        ?>
        <style>
        body {
    color:black;
    background-color:white;
    background-image:url(../resources/img/fond_admin.jpg);
    }
    </style>
    </head>
    <body>
        <!--==================================
        /       Modification d'un quetes     /
        ===================================-->
        <div class="container">
        <a href="quetes_admin.php"><button name="retour" class="btn btn-primary">Retour</button></a>
        <div class="p-3 mb-2 bg-dark text-white">
            <?php
                $id_quetes=$_POST['id_quetes'];
                $o=new quetes((integer)$id_quetes,"","","","","","","","","","");
                $unquetes=$o->affiche_quetes_total($o,$bdd);
                $_SESSION['id_quetes']=(int)$id_quetes;

            ?>
        <form action="../class/traitement_quetes.php" method="post">
        <div class="form-group">
            <label for="nom_quetes">Nom quetes</label>
            <input name="nom_quetes" type="text" class="form-control" id="nom_quetes" value="<?php echo $unquetes['nom_quetes']?>">
        </div>
        <div class="form-group">
            <label>description quetes</label>
            <input name="description_quetes" type="mail" class="form-control" id="exampleInputEmail1" value="<?php echo $unquetes['description_quetes']?>">
        </div>
        <div class="form-group">
            <input name="date_fin_quetes" type="hidden" class="form-control" id="exampleInputEmail1" value="<?php echo $unquetes['date_fin_quetes']?>">
        </div>
        <div class="form-group">
            <label>Difficulté</label>
            <input name="difficulte_quetes" type="number" class="form-control" id="exampleInputEmail1" value="<?php echo $unquetes['difficulte_quetes']?>">
        </div>
        <div class="form-group">
        <label>Type quete</label>
            <select name="periode_quetes" id="select" class="form-control">
                        <?php while($row=$req2->fetch())
                        {
                        ?>
                        <option value="<?php echo $row['titre_type_quetes']?>"<?php if($unquetes['id_type_quetes']==$row['id_type_quetes']){ echo "selected='selected'";}?>><?php echo $row['titre_type_quetes']?></option>
                        <?php
                        }
                        ?>
                      </select>
        </div>
        <div class="form-group">
            <label>Amount</label>
            <input name="amount_quetes" type="number" class="form-control" id="exampleInputEmail1" value="<?php echo $unquetes['amount_quetes']?>">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Etat quetes ( 0=Activé / 1=Desactivé )</label>
            <input name="etat_quetes" type="number" min="0" max="1" class="form-control" id="exampleInputEmail1" value="<?php echo $unquetes['etat_quetes']?>">
        </div>
        
        
        <button type="submit" class="btn btn-primary" value="Modifier" name="modifierq">Modifier</button>
        </form>
        </div>
      
        <?php
                
            require "../includes/import-js.php" ;
        ?>
    </body>
</html>