<?php
    function getQuestsToValidate()
    {
        require "../includes/BDDConnection.php";
        $requete = $bdd->prepare("SELECT id_validation_quetes,nom_image_quetes,description_image_quetes,date_fin_quetes,etat_quetes,validation_quetes.id_utilisateur,validation_quetes.id_quetes_utilisateur 
                                from validation_quetes
                                INNER JOIN quetes_utilisateur ON validation_quetes.id_quetes_utilisateur = quetes_utilisateur.id_quetes_utilisateur
                                WHERE validation_amount > -5
                                ORDER BY RAND()");
        $requete->execute();

        $Trouve = false;
        while($quete_a_valider = $requete->fetch(PDO::FETCH_ASSOC))
        {
            if($Trouve == false)
            {
                $requete2 = $bdd->prepare("SELECT * from police_quetes where id_utilisateur=".$_SESSION['id']." AND id_quetes_utilisateur=".$quete_a_valider['id_quetes_utilisateur']);
                $requete2->execute();
                
                if($requete2->rowCount() == 0)
                {
                    echo '
                        <div style="display:flex;" class="row">
                                <div style="margin:auto;" align="center" class="col-4">
                                    <a href="index.php?validate=true&id_quest='.$quete_a_valider['id_quetes_utilisateur'].'">
                                        <button class="btn btn-success">
                                            <svg width="15em" height="15em" viewBox="0 0 16 16" class="bi bi-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
                                            </svg>
                                        </button>
                                    </a>
                                </div>
                                <div class="col-4">
                                    <img src="../resources/img/'.$quete_a_valider['nom_image_quetes'].'">
                                </div>
                                <div style="margin:auto;" align="center" class="col-4">
                                    <a href="index.php?reject=true&id_quest='.$quete_a_valider['id_quetes_utilisateur'].'">
                                        <button class="btn btn-danger">
                                            <svg width="15em" height="15em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                            </svg>
                                        </button>
                                    </a>
                                </div>
                        </div>
                        <br>
                        <div class="row">
                            <div align="center" class="col-12">
                                <h3>'.$quete_a_valider['description_image_quetes'].'</h3>
                            </div>
                        </div>
                    ';
                    $Trouve = true;
                }
            }
            
        }
        if($Trouve == false)
        {
            echo '<div style="margin-top:200px;" class="row">
                        <div style="margin:auto;" align="center" class="col-12">
                            <h4>Il n\'y a plus de quêtes à valider pour le moment...</h4>
                        </div>
                                
                </div>';
        }
    }

    if(isset($_GET['validate']) && $_GET['validate'] == true)
    {
        $requete = $bdd->prepare("INSERT INTO police_quetes(id_quetes_utilisateur,id_utilisateur) VALUES(:idquest,".$_SESSION['id'].")");
        $requete->bindParam(':idquest', $_GET['id_quest']);
        $requete->execute();
        $requete = $bdd->prepare("UPDATE quetes_utilisateur SET validation_amount = validation_amount+1 WHERE id_quetes_utilisateur = :idquest");
        $requete->bindParam(':idquest', $_GET['id_quest']);
        $requete->execute();
        ?>
            <script>
                document.location.href="../Police";
            </script>
        <?php
    }
    else if(isset($_GET['reject']) && $_GET['reject'] == true)
    {
        $requete = $bdd->prepare("INSERT INTO police_quetes(id_quetes_utilisateur,id_utilisateur) VALUES(:idquest,".$_SESSION['id'].")");
        $requete->bindParam(':idquest', $_GET['id_quest']);
        $requete->execute();
        $requete = $bdd->prepare("UPDATE quetes_utilisateur SET validation_amount = validation_amount-1 WHERE id_quetes_utilisateur = :idquest");
        $requete->bindParam(':idquest', $_GET['id_quest']);
        $requete->execute();
        ?>
            <script>
                document.location.href="../Police";
            </script>
        <?php
    }
?>