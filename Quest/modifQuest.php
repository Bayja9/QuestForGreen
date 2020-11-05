<?php
session_start();
require "../includes/BDDConnection.php";

$requete = $bdd->prepare("UPDATE quetes_utilisateur SET amount_done_utilisateur = :newAmout WHERE id_quetes = :idquest AND id_utilisateur = :iduser");
$requete->bindParam(':newAmout', $_GET["newAmount"]);
$requete->bindParam(':idquest', $_GET["idQuest"]);
$requete->bindParam(':iduser', $_GET["idUtilisateur"]);
$requete->execute();

