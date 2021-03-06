        
        <?php
            session_start();
            require "../includes/BDDConnection.php";
        /*======================================================/
        /             Traitement de la connexion                /
        /======================================================*/
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
                        $requete = $bdd->prepare("SELECT * from utilisateur where mail_utilisateur = :login");
                    }
                    else
                    {
                        $requete = $bdd->prepare("SELECT * from utilisateur where username_utilisateur = :login");
                    }
                    $requete->bindParam(':login', $login);
                    
                    // exécute
                    $requete->execute();
                    $data=$requete->fetch();

                    if (md5($mdp) == $data['password_utilisateur']) // Acces OK !
                    {
                        $_SESSION['id'] = $data['id_utilisateur'];
                        $_SESSION['email'] = $data['mail_utilisateur'];	
                        $_SESSION['pseudo'] = $data['username_utilisateur'];
                        $_SESSION['xp'] = $data['xp_utilisateur'];
                        $_SESSION['point'] = $data['points_utilisateur'];
                        $_SESSION['niv'] = $data['niv'];
                        $_SESSION['img'] = $data['nom_image'];

                        echo'<div class="alert alert-success">Authentification Réussi</div>';
                    }
                    else
                    {
                        echo'<div class="alert alert-danger">Erreur lors de la connexion, vérifiez vos identifiants puis réessayez</div>';
                    }
                    $requete->closeCursor();
                }        
            }
        ?>