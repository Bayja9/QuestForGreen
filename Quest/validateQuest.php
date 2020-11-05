<?php
session_start();
require "../includes/BDDConnection.php";


$requete = $bdd->prepare("INSERT INTO validation_quetes (`nom_image_quetes`, `description_image_quetes`, `etat_quetes`, `id_utilisateur`, `id_quetes_utilisateur`) 
VALUES ( :nomIMG, :descIMG, 0, :idUtil, :idQuetesUtil)");
$requete->bindParam(':nomIMG', $_GET["nomIMG"]);
$requete->bindParam(':descIMG', $_GET["descIMG"]);
$requete->bindParam(':idUtil', $_GET["idUtil"]);
$requete->bindParam(':idQuetesUtil', $_GET["idQuetesUtil"]);

$requete->execute();

$requete = $bdd->prepare("UPDATE `quetes_utilisateur` SET `etat_quetes` = '1' WHERE `quetes_utilisateur`.`id_quetes_utilisateur` = :idQuetesUtil");
$requete->bindParam(':idQuetesUtil', $_GET["idQuetesUtil"]);
$requete->execute();


