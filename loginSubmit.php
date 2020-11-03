        <!--=====================================================
        /             Traitement de la connexion                /
        ======================================================-->
        <?php
            require "includes/header.php" ; 

            if(isset($_GET["login"]))
            {
                //Recupération des valeurs du formuaire dans des variables
                $login=$_GET['login'];
                $mdp=$_GET['mdp'];

                //Connexion de l'utilisateur
                if($login == '' || $mdp =='')
                {
                    echo'<div class="alert alert-warning">Erreur lors de la connexion, vérifiez vos identifiants puis réessayez</div>';
                }
                else
                {
                    if(strpos($login,"@"))
                    {
                        $requete = $bdd->prepare("SELECT * from login where email = :login");
                    }
                    else
                    {
                        $requete = $bdd->prepare("SELECT * from login where pseudo = :login");
                    }
                    $requete->bindParam(':login', $login);
                    
                    // exécute
                    $requete->execute();
                    $data=$requete->fetch();

                    if (md5($mdp) == $data['mdp']) // Acces OK !
                    {
                        $_SESSION['id'] = $data['id'];
                        $_SESSION['email'] = $data['email'];	
                        $_SESSION['pseudo'] = $data['pseudo'];	
                        echo'<div class="alert alert-success">Authentification Réussi</div>';
                    }
                    else
                    {
                        echo'<div class="alert alert-danger">Erreur lors de la connexion, vérifiez vos identifiants puis réessayez</div>';
                    }
                    $requete->closeCursor();
                }        
            }

            require "includes/import-js.php" ;
        ?>