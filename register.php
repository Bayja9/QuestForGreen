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
        <div class="container">
        <h2>Création du compte</h2>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" type="text" class="form-control" id="email" placeholder="Votre adresse email">
                </div>
                <div class="form-group">
                    <label for="pseudo">Pseudonyme</label>
                    <input name="pseudo" type="text" class="form-control" id="pseudo" placeholder="Votre pseudonyme">
                </div>
                <div class="form-group">
                    <label for="mdp">Mot de passe</label>
                    <input name="mdp" type="password" class="form-control" id="mdp" placeholder="Votre mot de passe">
                </div>
                <div class="form-group">
                    <label for="mdp2">Vérifiez votre mot de passe</label>
                    <input name="mdp-verif" type="password" class="form-control" id="mdp2" placeholder="Tapez une deuxième fois votre mot de passe">
                </div>
                <button onclick="register()" class="btn btn-primary">Créer un compte</button>
                <br>
                <a href="login.php">Déjà un compte ? Se connecter</a>
        </div>
     
        <?php
            require "includes/import-js.php" ;
        ?>
    </body>
</html>