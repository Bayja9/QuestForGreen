<?php
session_start();
//require_once('login.inc.php');
include "../includes/BDDConnection.php";
include "class_badge.php";


if (isset($_POST['enregistrerb']))
{
    $n_bad=$_POST['nom_badge'];
    $desc_bad=$_POST['description_badge'];
    $n_img_bad=$_POST['nom_image_badge'];


    $unbadge = new badge ('', $n_bad, $desc_bad, $n_img_bad,'','','','','','','','','','','');
    $unbadge-> ajout_badge($unbadge, $bdd);
    header('Location: ../admin/badges_admin.php');

}
if (isset($_POST['modifierb']))
{

    $id_bad=$_SESSION['id_badge'];
    $n_bad=$_POST['nom_badge'];
    $desc_bad=$_POST['description_badge'];
    $n_img_bad=$_POST['nom_image_badge'];
    $etat_badge=$_POST['etat_badge'];


    $unbadge = new badge ($id_bad, $n_bad, $desc_bad, $n_img_bad,$etat_badge,"","","","","","","","","","");
    $unbadge-> modif_badge($unbadge, $bdd);
    var_dump($unbadge);
    header('Location: ../admin/badges_admin.php');

}
if (isset($_POST['supprb']))
{

    $id_badge=$_POST['idbadge'];
    $unbadge = new badge((integer)$id_badge,"","","","","","","","","","","","","","");
    $u = $unbadge -> suppr_badge($unbadge, $bdd);
    header('Location: ../admin/badges_admin.php');
}
?>
