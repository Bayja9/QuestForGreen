<!DOCTYPE html>
<html>
    <header>
        <?php 
            session_start();
            require "../includes/BDDConnection.php";
        ?>
        <link rel="stylesheet" href="/QuestForGreen/resources/bootstrap/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    </header>
    <link rel="icon" type="image/png" href="../resources/img/logoV2.png" />

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
                <a href="../Login">Déjà un compte ? Se connecter</a>
                <div align="center" class="getResponseRegister" id="getResponseRegister"></div>
        </div>
     
        <?php
            require "../includes/import-js.php" ;
        ?>
    </body>
</html>