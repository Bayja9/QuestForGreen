<!DOCTYPE html>
<html>
    <header>
        <?php 
            require "includes/header.php" ; 
        ?>
    </header>
    <body>

        <?php

            //if(!isset($_SESSION['email']))
            //{
                ?>
                    <script>
                        document.location.href="Login/";
                    </script>
                <?php
            //}

            require "includes/import-js.php" ;
        ?>
    </body>
</html>