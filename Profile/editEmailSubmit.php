        <!--=====================================================
        /      Traitement de la modification de l'email         /
        ======================================================-->
        <?php
            require "../includes/header.php" ; 

            if(isset($_GET["email"]))
            {
                if($_GET['email'] == '')
                {
                    echo'<div class="alert alert-warning">Veuillez saisir un email</div>';
                }
                else
                {
                    $requete = $bdd->prepare("SELECT mail_utilisateur from utilisateur where username_utilisateur=:email");
                    $requete->bindParam(':email', $_GET['email']);
                    $requete->execute();
                    if($requete->rowCount() == 0)
                    {
                        if(strpos($_GET['email'],"@"))
                        {
                            $requete = $bdd->prepare("UPDATE utilisateur SET mail_utilisateur=:email WHERE id_utilisateur=".$_SESSION['id']);
                            $requete->bindParam(':email', $_GET['email']);
                            if($requete->execute())
                            {
                                echo'<div class="alert alert-success">Votre Email va être modifié !</div>';
                                $_SESSION['email'] = $_GET['email'];
                            }
                            $requete->closeCursor();
                        }
                        else
                        {
                            echo'<div class="alert alert-danger">Vous avez saisi un mauvais email, <a href="../Profile">veuillez réessayer</a></div>';
                        }
                    }
                    else
                    {
                        echo'<div class="alert alert-danger">Ce mail existe déjà ! <a href="../Profile">veuillez réessayer</a></div>';
                    }
                }        
            }

            require "../includes/import-js.php" ;
        ?>