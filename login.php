<!DOCTYPE html>
<html>
    <header>
        <?php 
            
            require "header.php" ; 
        ?>
    </header>
    <body>
        <!--=====================================================
        /       Affichage du formulaire de connexion            /
        ======================================================-->
        <div class="container">
            <form method="post" action"#">
                <div class="form-group">
                    <label for="exampleInputlogin1">Identifiant</label>
                    <input name="login" type="text" class="form-control" id="exampleInputlogin1" aria-describedby="loginHelp" placeholder="Adresse email ou pseudonyme">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mot de passe</label>
                    <input name="mdp" type="password" class="form-control" id="exampleInputPassword1" placeholder="Votre mot de passe">
                </div>
                <button type="submit" class="btn btn-primary">Connexion</button>
            </form>
        </div>

        <!--=====================================================
        /             Traitement de la connexion                /
        ======================================================-->
        <?php
            if(isset($_POST["login"]))
            {
                //Recupération des valeurs du formuaire dans des variables
                $login=$_POST['login'];
                $mdp=$_POST['mdp'];

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
        ?>
        <?php
            require "import-js.php" ;
        ?>
    </body>
</html>