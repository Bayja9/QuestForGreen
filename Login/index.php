<!DOCTYPE html>
<html>
    <head>
        <?php 
            
            require "../includes/header.php" ; 
            unset($_SESSION['email']);
            unset($_SESSION['pseudo']);
            unset($_SESSION['id']);
        ?>
    </head>
    <body>
        <!--=====================================================
        /       Affichage du formulaire de connexion            /
        ======================================================-->
        <div class="container">
            <h2>Authentification</h2>
                <div class="form-group">
                    <label for="login">Identifiant</label>
                    <input name="login" type="text" class="form-control" id="login" aria-describedby="loginHelp" placeholder="Adresse email ou pseudonyme">
                </div>
                <div class="form-group">
                    <label for="mdp">Mot de passe</label>
                    <input name="mdp" type="password" class="form-control" id="mdp" placeholder="Votre mot de passe">
                </div>
                <button onclick="connect()" class="btn btn-primary">Connexion</button>
                <br>
                <a href="../Register">Créer un compte ?</a>
                <div align="center" class="getResponseConnect" id="getResponseConnect"></div>
        </div>

        <?php
            require "../includes/import-js.php" ;
        ?>
    </body>
</html>