<?php
session_start();
//require_once('login.inc.php');
include "BDDConnection.php";
include "class_utilisateur.php";
include "letraitementlogin.php";


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
    $pass_util=$_POST['password_utilisateur'];
    $mail_util=$_POST['mail_utilisateur'];

    $unutilisateur = new utilisateur ($id_util, $user_util, $pass_util, $mail_util);
    $unutilisateur-> modif_utilisateur($unutilisateur, $bdd);
    //$_SESSION['id_utilisateur']='';
    header('Location: ./modif_utilisateur.php');

}
if (isset($_POST['suppru']))
{

    $id_utilisateur=$_POST['choix_utilisateur_suppr'];
    $unutilisateur = new utilisateur((integer)$id_utilisateur,'','','');
    $u = $unutilisateur -> suppr_utilisateur($unutilisateur, $bdd);
    header('Location: ./suppr_utilisateur.php');
}
?>
