<!DOCTYPE html>
<html>
    <?php require "../includes/header.php" ?>
    <LINK rel="stylesheet" href="../resources/css/home.css"/>
    <link rel="icon" type="image/png" href="../resources/img/logoV2.png" />
    <title>QuestForGreen - Home</title>
    <body>
        <img id="flora" src="../resources/img/Flora.png" alt="floraPNJ">
        <div id="UImenu">
            <div id="block1">
                <div id="userImg"></div>
                <label id="username">Username</label>
            </div>
            <div id="block2">
                <div id="block3">
                    <div id="blockPoints">
                    <label id="points">Points : ----- pts</label>
                    </div>
                    <div id="Slots">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg%22%3E">
                        <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                        <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                    </svg>
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-journal-bookmark-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg%22%3E">
                        <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                        <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                        <path fill-rule="evenodd" d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8V1z"/>
                    </svg>
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-suit-heart-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg%22%3E">
                        <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"/>
                    </svg>      
                    </div>
                </div>
                <div id="power">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-power" fill="currentColor" xmlns="http://www.w3.org/2000/svg%22%3E">
                        <path fill-rule="evenodd" d="M5.578 4.437a5 5 0 1 0 4.922.044l.5-.866a6 6 0 1 1-5.908-.053l.486.875z"/>
                        <path fill-rule="evenodd" d="M7.5 8V1h1v7h-1z"/>
                    </svg>
                </div>
                
                <div class="progress">
                    <div id="blockXp">
                        <label id="xp">5</label>/<label id="axp">100</label>xp
                    </div>
                    <div class="progress-bar" role="progressbar" style="width: 5%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            
        </div>
        <?php require "../includes/import-js.php" ?>
    </body>
</html>