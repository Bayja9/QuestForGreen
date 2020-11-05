<!DOCTYPE html>
<html>
    <head>
        <?php 
            session_start();
            require "../includes/BDDConnection.php";
            unset($_SESSION['email']);
            unset($_SESSION['pseudo']);
            unset($_SESSION['id']);
        ?>
        <link rel="stylesheet" href="/QuestForGreen/resources/bootstrap/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="/QuestForGreen/resources/css/style.css">

    </head>
    <link rel="icon" type="image/png" href="../resources/img/logoV2.png" />
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
                </div>
                <div class="d-flex justify-content-around align-items-center">
                    <a href="../Register">Créer un compte</a>
                    <button type="submit" onclick="connect()" class="font-Aclonica btn btn-login">Connexion</button>
                </div>
                <div align="center" class="getResponseConnect" id="getResponseConnect"></div>
            </div>
        </div>

        <?php
            require "../includes/import-js.php" ;
        ?>
    </body>
</html>