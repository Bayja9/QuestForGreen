<?php
session_start();
//require_once('login.inc.php');
include "../includes/BDDConnection.php";
include "class_quetes.php";


if (isset($_POST['enregistrerq']))
{
    $nom_que=$_POST['nom_quetes'];
    $desc_que=$_POST['description_quetes'];
    $date_fin_que=$_POST['date_fin_quetes'];
    $dif_que=$_POST['difficulte_quetes'];
    $period_que=$_POST['periode_quetes'];
    $amont_que=$_POST['amount_quetes'];


    $unquetes = new quetes('', $nom_que, $desc_que, $date_fin_que, $dif_que, $period_que, $amont_que,'','','','');
    $unquetes-> ajout_quetes($unquetes, $bdd);
    header('Location: ../admin/quetes_admin.php');

}
if (isset($_POST['modifierq']))
{
    $id_que=$_SESSION['id_quetes'];
    $nom_que=$_POST['nom_quetes'];
    $desc_que=$_POST['description_quetes'];
    $dif_que=$_POST['difficulte_quetes'];
    $period_que=$_POST['periode_quetes'];
    $amont_que=$_POST['amount_quetes'];
    $etat_que=$_POST['etat_quetes'];


    $unquetes = new quetes ($id_que, $nom_que, $desc_que, $dif_que, $period_que, $amont_que, $etat_que,"","","","");
    $unquetes-> modif_quetes($unquetes, $bdd);
    header('Location: ../admin/quetes_admin.php');

}
if (isset($_POST['supprq']))
{

    $id_quetes=$_POST['id_quetes'];
    $unquetes = new quetes((integer)$id_quetes,'','','','','','','','','','');
    $u = $unquetes -> suppr_quetes($unquetes, $bdd);
    //header('Location: ../admin/quetess_admin.php');
    
}
?>
