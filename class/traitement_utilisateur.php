<?php
session_start();
//require_once('login.inc.php');
include "../includes/BDDConnection.php";
include "class_utilisateur.php";


if (isset($_POST['enregistreru']))
{
    $user_util=$_POST['username_utilisateur'];
    $pass_util=$_POST['password_utilisateur'];
    $mail_util=$_POST['mail_utilisateur'];


    $unutilisateur = new utilisateur('', $user_util, $pass_util, $mail_util);
    $unutilisateur-> ajout_utilisateur($unutilisateur, $bdd);
    header('Location: ./inscription_utilisateur.php');

}
if (isset($_POST['modifieru']))
{

    $id_util=$_SESSION['id_utilisateur'];
    $user_util=$_POST['username_utilisateur'];
    $mail_util=$_POST['mail_utilisateur'];
    $niv_util=$_POST['niv_utilisateur'];
    $xp_util=$_POST['xp_utilisateur'];
    $points_util=$_POST['points_utilisateur'];
    $etat_util=$_POST['etat_utilisateur'];
    $nom_img=$_POST['nom_img_utilisateur'];

    $unutilisateur = new utilisateur ($id_util, $user_util, '', $xp_util, $points_util, $mail_util, $niv_util, $nom_img,$etat_util);
    $unutilisateur-> modif_utilisateur($unutilisateur, $bdd);
    var_dump($unutilisateur);
    header('Location: ../admin/utilisateurs_admin.php');
    
}
if (isset($_POST['suppru']))
{

    $id_utilisateur=$_POST['idutil'];
    $unutilisateur = new utilisateur((integer)$id_utilisateur,'','','','','','','','');
    $u = $unutilisateur -> suppr_utilisateur($unutilisateur, $bdd);
    header('Location: ../admin/utilisateurs_admin.php');
}
?>
