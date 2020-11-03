<?php
session_start();
//require_once('login.inc.php');
include "BDDConnection.php";
include "class_badge.php";
include "letraitementlogin.php";


if (isset($_POST['enregistrerb']))
{
    $user_util=$_POST['nom_badge'];
    $pass_util=$_POST['description_badge'];
    $user_util=$_POST['nom_image_badge'];


    $unbadge = new badge ('', $n_bad, $desc_bad, $n_img_bad);
    $unbadge-> ajout_badge($unbadge, $bdd);
    header('Location: ./inscription_badge.php');

}
if (isset($_POST['modifierb']))
{

    $id_bad=$_SESSION['id_badge'];
    $n_bad=$_POST['nom_badge'];
    $desc_bad=$_POST['description_badge'];
    $n_img_bad=$_POST['nom_image_badge'];

    $unbadge = new badge ($id_bad, $n_bad, $desc_bad, $n_img_bad);
    $unbadge-> modif_badge($unbadge, $bdd);
    //$_SESSION['id_badge']='';
    header('Location: ./modif_badge.php');

}
if (isset($_POST['supprb']))
{

    $id_badge=$_POST['choix_badge_suppr'];
    $unbadge = new badge((integer)$id_bad,'','','');
    $u = $unbadge -> suppr_badge($unbadge, $bdd);
    header('Location: ./suppr_badge.php');
}
?>
