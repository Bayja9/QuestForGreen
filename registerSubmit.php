   <!--=====================================================
        /             Traitement de la création de compte       /
        ======================================================-->
        <?php
            require "includes/header.php" ; 

            if(isset($_GET["email"]))
            {
                if($_GET['email'] != '' && $_GET['pseudo'] != '' && $_GET['mdp'] != '' && $_GET['mdp-verif'] != '')
                {
                    if($_GET['mdp'] == $_GET['mdp-verif'])
                    {
                        if(strpos($_GET['email'],"@"))
                        {
                            $requete = $bdd->prepare("SELECT * from utilisateur where mail_utilisateur=:email OR username_utilisateur=:pseudo");
                            $requete->bindParam(':email', $_GET['email']);
                            $requete->bindParam(':pseudo', $_GET['pseudo']);
                            $requete->execute();
                            if($requete->rowCount() == 0)
                            {
                                //Inscription des valeurs dans la base de données
                                $requete = $bdd->prepare("INSERT INTO utilisateur(mail_utilisateur,username_utilisateur,password_utilisateur,xp_utilisateur,points_utilisateur,etat_utilisateur) Values(:email,:pseudo,MD5(:mdp),0,0,0)");
                                $requete->bindParam(':email', $_GET['email']);
                                $requete->bindParam(':pseudo', $_GET['pseudo']);
                                $requete->bindParam(':mdp', $_GET['mdp']);

                                // insertion
                                if($requete->execute())
                                {
                                    echo'<div class="alert alert-success">Création de votre compte réussi ! Vous pouvez à présent <a href="login.php">vous connecter</a></div>';
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
                                    echo'<div class="alert alert-warning">Une erreur est survenu, cela n\'aurait pas dû arriver, veuillez contacter l\'administrateur</div>';
                                }
                                $requete->closeCursor();

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

            require "includes/import-js.php" ;
        ?>