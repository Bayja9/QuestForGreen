<!DOCTYPE html>
<html>
    <header>
        <?php 
            
            require "includes/header.php" ; 
        ?>
    </header>
    <body>
        <!--=====================================================
        /       Affichage du formulaire de création de compte   /
        ======================================================-->
        <div class="login position-absolute">
            <div class="container login-container">
            <h2 class="text-center font-Aclonica title-login">S'enregistrer</h2>
                <form method="post" action="#">
                    <div class="form-group">
                        <label  class="font-Aclonica" for="email">Email:</label>
                        <input name="email" type="text" class="form-control" id="email" placeholder="Votre adresse email">
                    </div>
                    <div class="form-group">
                        <label class="font-Aclonica" for="pseudo">Pseudonyme:</label>
                        <input name="pseudo" type="text" class="form-control" id="pseudo" placeholder="Votre pseudonyme">
                    </div>
                    <div class="form-group">
                        <label class="font-Aclonica" for="mdp">Mot de passe:</label>
                        <input name="mdp" type="password" oninput="checkMdp()" class="mdp form-control" id="mdp" placeholder="Votre mot de passe">
                    </div>

                    <div class="form-group">
                        <label class="font-Aclonica" for="mdp2">Confirmer mot de passe:</label>
                        <input name="mdp-verif" oninput="checkMdp()" type="password" class="mdp form-control" id="mdp2" placeholder="Confirmer mot de passe">
                    </div>
                    <div class="d-flex justify-content-around align-items-center">
                        <a href="login.php">Déjà un compte</a>
                        <button type="submit" id="register-btn" class="btn btn-login" disabled>S'enregistrer</button>
                    </div>
                </form>
            </div>
        </div>

        <!--=====================================================
        /             Traitement de la création de compte       /
        ======================================================-->
        <?php
            if(isset($_POST["email"]))
            {
                if($_POST['email'] != '' && $_POST['pseudo'] != '' && $_POST['mdp'] != '' && $_POST['mdp-verif'] != '')
                {
                    if($_POST['mdp'] == $_POST['mdp-verif'])
                    {
                        if(strpos($_POST['email'],"@"))
                        {
                            $requete = $bdd->prepare("SELECT * from login where email=:email OR pseudo=:pseudo");
                            $requete->bindParam(':email', $_POST['email']);
                            $requete->bindParam(':pseudo', $_POST['pseudo']);
                            $requete->execute();
                            if($requete->rowCount() == 0)
                            {
                                //Inscription des valeurs dans la base de données
                                $requete = $bdd->prepare("INSERT INTO login(email,pseudo,mdp) Values(:email,:pseudo,MD5(:mdp))");
                                $requete->bindParam(':email', $_POST['email']);
                                $requete->bindParam(':pseudo', $_POST['pseudo']);
                                $requete->bindParam(':mdp', $_POST['mdp']);

                                // insertion
                                if($requete->execute())
                                {
                                    echo'<div class="alert alert-success">Création de votre compte réussi ! Vous allez être redirigé sur la page de connexion...</div>';
                                }
                                else
                                {
                                    echo'<div class="alert alert-warning">Une erreur est survenu, cela n\'aurait pas dû arriver, veuillez contacter l\'administrateur</div>';
                                }
                                $requete->closeCursor();
                                ?>
                                    <script>            
                                        function redirect()
                                        {
                                            document.location.href="login.php";
                                        }
                                        setTimeout(redirect,1000);
                                    </script>
                                <?php
                            }
                            else
                            {
                                echo'<div class="alert alert-warning">Email ou pseudonyme déjà existant, si vous avez un compte : <a href="login.php">Connectez-vous !</a></div>';
                            }
                        }
                        else
                        {
                            echo'<div class="alert alert-warning">Email invalide, vérifiez l\'adresse email entrée</div>';
                        }
                        
                        
                    }
                    else
                    {
                        echo'<div class="alert alert-warning">Les deux mots de passe ne sont pas les mêmes !</div>';
                    }
               
                }
                else
                {
                    echo'<div class="alert alert-warning">Quelque chose s\'est mal passé, vérifiez que vous avez rempli tous les champs</div>';
                }
            }
        ?>
        <?php
            require "includes/import-js.php" ;
        ?>
    </body>
    <script>

        var register = document.getElementById('register-btn');

        function checkMdp() {
            var mdp = document.getElementById('mdp').value;
            var mdp2 = document.getElementById('mdp2').value;
            if(mdp != mdp2){
                register.disabled = true;
            }
            else register.disabled = mdp == '' || mdp2 == '';
        }
    </script>
</html>
