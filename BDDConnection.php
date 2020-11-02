<?php
//=======================
//    A Régler          /
//=======================
try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=questforgreen', 'questforgreen', 'WorkShopB3E14');
	}
	catch(Exception $e)
	{
		die('Erreur : ' .$e->getMessage());
	}
?>