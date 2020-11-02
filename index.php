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
                ?>
                    <script>
                        document.location.href="login.php";
                    </script>
                <?php
            //}

            require "import-js.php" ;
        ?>
    </body>
</html>