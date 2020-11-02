<!DOCTYPE html>
<html>
    <header>
        <?php 
            require "header.php" ; 
        ?>
    </header>
    <body>

        <?php

            //if(!isset($_SESSION['email']))
            //{
                header('Location: login.php');
                exit();
            //}

            require "import-js.php" ;
        ?>
    </body>
</html>