<?php
session_start();
require "../includes/BDDConnection.php";


$requete = $bdd->prepare("INSERT INTO validation_quetes (`nom_image_quetes`, `description_image_quetes`, `etat_quetes`, `id_utilisateur`, `id_quetes`) 
VALUES ( :nomIMG, :descIMG, 0, :idUtil, :idQuetes)");
$requete->bindParam(':nomIMG', $_GET["nomIMG"]);
$requete->bindParam(':descIMG', $_GET["descIMG"]);
$requete->bindParam(':idUtil', $_GET["idUtil"]);
$requete->bindParam(':idQuetes', $_GET["idQuetes"]);

$requete->execute();

$requete = $bdd->prepare("UPDATE `quetes_utilisateur` SET `etat_quetes_utilisateur` = '1' WHERE `quetes_utilisateur`.`id_quetes` = :idQuetes");
$requete->bindParam(':idQuetes', $_GET["idQuetes"]);
$requete->execute();


