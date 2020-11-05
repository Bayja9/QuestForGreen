<!DOCTYPE html>
<html style="height: 100%">
<?php
            require "../includes/header.php";
            $requete = $bdd->prepare("SELECT * FROM utilisateur WHERE id_utilisateur = :id");
            $requete->bindParam(':id', $_SESSION["id"]);
            $requete->execute();
            $result = $requete->fetch();
?>
<?php require "function_profile.php" ?>
<LINK rel="stylesheet" href="../resources/css/home.css"/>
<link rel="icon" type="image/png" href="../resources/img/logoV2.png" />
<title>QuestForGreen - Home</title>
<body>
<header>
    <h1 style="color: #275410; font-weight: bold; letter-spacing: 6px;" class="font-Aclonica"> QuestForGreen </h1>
</header>
<div class="profile-content" style="height: 100%; background: linear-gradient(90deg, rgba(79, 174, 153, 1) 0%, rgba(186, 231, 203, 1) 100%);">
    <div id="UImenuTop" >
        <div id="block1">
            <div id="userImg" class="d-flex justify-content-center align-items-center">
                <img id="output" width="201px" style="border-radius: 100%; padding: 7px" height="200px" src="<?php echo isset($_SESSION['img'])? $_SESSION['img'] : '../resources/img/no-img.jpg'?>">
                <span class="btn btn-file" style="position: absolute; bottom: 0;">
                     <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill" fill="black" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                     </svg>
                    <input id="file" onchange="loadFile()" type="file" name="img">
                </span>
            </div>
        </div>
        <div id="block2" class="d-flex">
            <h4 class="lvl">LVL <?php echo $result["niv"] ?></h4>
<!--            <div onclick="retour()" id="icon-back">-->
<!--                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-power" fill="currentColor" xmlns="http://www.w3.org/2000/svg%22%3E">-->
<!--                                            <path fill-rule="evenodd" d="M5.578 4.437a5 5 0 1 0 4.922.044l.5-.866a6 6 0 1 1-5.908-.053l.486.875z"/>-->
<!--                                            <path fill-rule="evenodd" d="M7.5 8V1h1v7h-1z"/>-->
<!--                                        </svg>-->
<!--            </div>-->

            <div class="progress-profile">
                <div id="blockXp-profile">
                    <label id="xp"><?php echo $_SESSION["xp"] ?></label>/<label id="axp">100</label>xp
                </div>
                <div class="progress-bar" role="progressbar" style="width: <?php echo $_SESSION["xp"] ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>

    </div>


    <!--=============================================
   /             Section Badge                /
   ==============================================-->
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-8">
                <div class="badge-content">
                    <h3 class="text-center font-Aclonica"> Derniers badges gagnés: </h3>
                    <div class="border-fullrounded white-background d-flex justify-content-center">
                        <img class="mx-2 badge-img" height="75" src="../resources/img/glass_bottle.png">
                        <img class="mx-2 badge-img" height="75" src="../resources/img/glass_bottle.png">
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="block3" style="min-width: 30%; text-align: center; max-width: 1110px;">
        <div class="blockPoints white-background">
            <label id="points">Points : <?php echo $_SESSION["point"] ?> pts</label>
        </div>
    </div>

    <!--=============================================
    /             Section Pseudonyme                /
    ==============================================-->
    <div style="margin-top:20px;" class="container">
        <div class="row">
            <div class="col-6 d-flex justify-content-center">
                <div id="showButtonEditUsername">
                    <div class="d-flex align-items-center white-background justify-content-center">
                        <div class="font-Aclonica  mr-3"><?php echo $_SESSION['pseudo']; ?></div>
                        <div>
                            <button onclick="showFormEditUsername()" type="button" class="btn btn-dark">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill" fill="white" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                    <div id="showFormEditUsername">
                        <div class="d-flex justify-content-around white-background align-items-baseline">
                            <div class="form-group mr-1">
                                <label style="display: none" for="pseudo">Modification du pseudonyme</label>
                                <input name="pseudo" type="text" class="form-control" placeholder="<?php echo $_SESSION['pseudo']; ?>" id="pseudo" aria-describedby="emailHelp">
                            </div>
                            <div>
                                <button onclick="sendFormEditUsername()" class="btn btn-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0z" fill="none"/><path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z"/></svg>
                                </button>
                                <button onclick="hideFormEditUsername()" class="btn btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0z" fill="none"/><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div id="getResponseEditUsername" class="getResponseEditUsername"></div>
            </div>
            <!--=============================================
            /             Section Email                     /
            ==============================================-->
            <div class="col-6">
                <div class="d-flex align-items-center">
                    <div id="showButtonEditEmail">
                        <div class="d-flex align-items-center white-background justify-content-center">
                            <div class="font-Aclonica  mr-3"><?php echo $_SESSION['email']; ?></div>
                            <div>
                                <button onclick="showFormEditEmail()" type="button" class="btn btn-dark">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill" fill="white" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div id="showFormEditEmail">
                        <div class="d-flex justify-content-around white-background align-items-baseline">
                            <div class="form-group mr-1">
                                <label style="display: none" for="pseudo">Modification du pseudonyme</label>
                                <input name="email" type="text" class="form-control" placeholder="<?php echo $_SESSION['email']; ?>" id="email" aria-describedby="emailHelp">
                            </div>
                            <div>
                                <button onclick="sendFormEditEmail()" class="btn btn-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0z" fill="none"/><path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z"/></svg>
                                </button>
                                <button onclick="hideFormEditEmail()" class="btn btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0z" fill="none"/><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div id="getResponseEditEmail" class="getResponseEditEmail"></div>
                </div>
            </div>
        </div>
        <h3 class="m-4 font-Aclonica text-center">Quêtes accomplies</h3>
        <div class="col-12">
            <table class="table">
                <thead class="text-center">
                <tr>
                    <th scope="col">Nom de la quête</th>
                    <th scope="col">Date de validation</th>
                    <th scope="col">Nombre de confirmation</th>
                </tr>
                </thead>
                <tbody class="text-center r-vertical">
                <?php getQuestsValidate(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<div id="retour" onclick="back()">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="300" height="300" viewBox="0 0 300 300" xml:space="preserve">
            <desc>Created with Fabric.js 4.2.0</desc>
            <defs>
            </defs>
            <rect x="0" y="0" width="100%" height="100%" fill="transparent"></rect>
            <g transform="matrix(1 0 0 1 150 150)" id="49280fde-27f3-44aa-a689-915442b419b7"  >
            <rect style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1; visibility: hidden;" vector-effect="non-scaling-stroke"  x="-150" y="-150" rx="0" ry="0" width="300" height="300" />
            </g>
            <g transform="matrix(Infinity NaN NaN Infinity 0 0)" id="962bad33-fadf-4549-b5f3-801d23f8bdab"  >
            </g>
            <g transform="matrix(3.95 0 0 3.95 150 150)" id="d7b2af99-7917-4ce8-ac2e-7fced58e2915"  >
            <path style="stroke: rgb(0,0,0); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(181,181,181); fill-rule: nonzero; opacity: 1;" vector-effect="non-scaling-stroke"  transform=" translate(-48.78, -49.51)" d="M 52.122 73.982 L 11.063 50.273 L 44.59 16.744 L 44.59 32.771 C 81.936 31.042 89.263 52.512 85.701 82.27600000000001 C 79.695 61.46600000000001 68.148 50.22300000000001 48.55899999999999 52.97000000000001 L 52.122 73.982 z" stroke-linecap="round" />
            </g>
            </svg>
        </div>
<?php require "../includes/import-js.php" ?>
<script>
    initPageProfile();
</script>
<script>
    function profile() {
        document.location.href = "/QuestForGreen/Profile";
    }

    function quest() {
        document.location.href = "/QuestForGreen/Quest";
    }

    function retour() {
        document.location.href = "/QuestForGreen/login";
    }

    function friend() {
        document.location.href = "/QuestForGreen/Friend";
    }
</script>
</body>
</html>
