<!DOCTYPE html>
<html>
    <header>
        <?php 
            session_start();
            require "../includes/BDDConnection.php";
        ?>
        <link rel="stylesheet" href="/QuestForGreen/resources/bootstrap/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="/QuestForGreen/resources/css/style.css">
    </header>
    <link rel="icon" type="image/png" href="../resources/img/logoV2.png" />

    <body>
        <!--=====================================================
        /       Affichage du formulaire de création de compte   /
        ======================================================-->
        <div class="login position-absolute">
            <div class="container login-container">
                <h2 class="text-center font-Aclonica title-login">S'enregistrer</h2>
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
                        <a href="../Login">Déjà un compte</a>
                        <button onclick="register()" id="register-btn" class="btn btn-login" disabled>S'enregistrer</button>
                    </div>
                    <div align="center" class="getResponseRegister" id="getResponseRegister"></div>
            </div>
        </div>
     

        <?php
            require "../includes/import-js.php" ;
        ?>

    </body>
</html>