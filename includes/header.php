
    <head>
        <?php
            session_start();
            require "BDDConnection.php";
            if(!isset($_SESSION['pseudo']))
            {
                ?>
                    <script>
                        document.location.href="/QuestForGreen/Login/";
                    </script>
                <?php
            }
        ?>
        <link rel="stylesheet" href="/QuestForGreen/resources/bootstrap/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="/QuestForGreen/resources/fontawesome/css/all.css">
    </head>
<link rel="icon" type="image/png" href="../resources/img/logoV2.png" />
