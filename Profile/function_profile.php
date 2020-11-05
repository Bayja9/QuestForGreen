<?php
    function getQuestsValidate()
    {
        require "../includes/BDDConnection.php";
        $requete = $bdd->prepare("SELECT nom_quetes,validation_quetes.date_fin_quetes,validation_amount FROM validation_quetes,quetes_utilisateur,quetes 
        WHERE quetes_utilisateur.id_quetes = quetes.id_quetes 
        AND quetes_utilisateur.id_quetes = validation_quetes.id_quetes 
        AND quetes_utilisateur.id_utilisateur = :id 
        AND quetes_utilisateur.etat_quetes_utilisateur = 1");

        $requete->bindParam(':id', $_SESSION['id']);
        // exécute
        $requete->execute();
        
        while($quete_valide = $requete->fetch(PDO::FETCH_ASSOC))
        {

            echo "<tr>
            <td>".$quete_valide['nom_quetes']."</td>
            <td>".$quete_valide['date_fin_quetes']."</td>
            <td>".$quete_valide['validation_amount']."</td>
            </tr>";
        }
    }

?>
