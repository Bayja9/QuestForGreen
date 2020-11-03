        <!--=====================================================
        /      Traitement de la modification du pseudo          /
        ======================================================-->
        <?php
            require "../includes/header.php" ; 

            if(isset($_GET["pseudo"]))
            {
                if($_GET['pseudo'] == '')
                {
                    echo'<div class="alert alert-warning">Veuillez saisir un pseudo : <a href="../Profile">veuillez réessayer</a></div>';
                }
                else
                {
                    $requete = $bdd->prepare("SELECT username_utilisateur from utilisateur where username_utilisateur=:pseudo");
                    $requete->bindParam(':pseudo', $_GET['pseudo']);
                    $requete->execute();
                    if($requete->rowCount() == 0)
                    {
                        $requete = $bdd->prepare("UPDATE utilisateur SET username_utilisateur=:pseudo WHERE id_utilisateur=".$_SESSION['id']);
                        $requete->bindParam(':pseudo', $_GET['pseudo']);
                        if($requete->execute())
                        {
                            echo'<div class="alert alert-success">Votre pseudo va bien être modifié !</div>';
                            $_SESSION['pseudo'] = $_GET['pseudo'];
                        }
                        $requete->closeCursor();
                    }
                    else
                    {
                        echo'<div class="alert alert-warning">Le pseudonyme existe déjà, <a href="../Profile">veuillez réessayer</a></div>';
                    }
                }        
            }

            require "../includes/import-js.php" ;
        ?>