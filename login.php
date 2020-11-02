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
            <h2>Authentification</h2>
            <form method="post" action"#">
                <div class="form-group">
                    <label for="login">Identifiant</label>
                    <input name="login" type="text" class="form-control" id="login" aria-describedby="loginHelp" placeholder="Adresse email ou pseudonyme">
                </div>
                <div class="form-group">
                    <label for="mdp">Mot de passe</label>
                    <input name="mdp" type="password" class="form-control" id="mdp" placeholder="Votre mot de passe">
                </div>
                <button type="submit" class="btn btn-primary">Connexion</button>
                <br>
                <a href="register.php">Créer un compte ?</a>
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