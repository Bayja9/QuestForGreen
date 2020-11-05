<?php
    function getQuestsValidate()
    {
        require "../includes/BDDConnection.php";
        $requete = $bdd->prepare("SELECT Count(id_validation_quetes) as nbconfirmation, id_quetes, date_fin_quetes from validation_quetes where id_utilisateur = :id GROUP BY id_quetes");
        $requete->bindParam(':id', $_SESSION['id']);
        // exécute
        $requete->execute();
        
        while($quete_valide = $requete->fetch(PDO::FETCH_ASSOC))
        {
            $requete2 = $bdd->prepare("SELECT nom_quetes from quetes where id_quetes = :idquete");
            $requete2->bindParam(':idquete', $quete_valide['id_quetes']);
            // exécute
            $requete2->execute();
            $data=$requete2->fetch();

            echo "<tr>
            <td>".$data['nom_quetes']."</td>
            <td>".$quete_valide['date_fin_quetes']."</td>
            <td>".$quete_valide['nbconfirmation']."</td>
            </tr>";
        }
    }

?>
