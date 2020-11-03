<!DOCTYPE html>
<html>
    <head>
        <?php 
            
            require "includes/header.php" ; 
        ?>
    </head>
    <body>
        <!--=====================================================
        /       Affichage du formulaire de connexion            /
        ======================================================-->
        <div class="login position-absolute">
            <div class="container login-container">
                <h2 class="text-center font-Aclonica title-login">QuestForGreen</h2>
                    <div class="form-group">
                        <label class="font-Aclonica" for="login">Identifiant:</label>
                        <input name="login" type="text" class="form-control" id="login" aria-describedby="loginHelp" placeholder="Email ou pseudonyme">
                    </div>
                    <div class="form-group">
                        <label class="font-Aclonica"for="mdp">Mot de passe:</label>
                        <input name="mdp" type="password" class="form-control" id="mdp" placeholder="Votre mot de passe">
                        <a href="" class="forgotten-password">Mot de passe oublié ?</a>
                    </div>
                <div class="d-flex justify-content-around align-items-center">
                    <a href="register.php">Créer un compte</a>
                    <button onclick="connect()" class="font-Aclonica btn btn-login">Connexion</button>
                </div>
            </div>
        </div>
        <?php
            require "includes/import-js.php" ;
        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        
    </body>
</html>
