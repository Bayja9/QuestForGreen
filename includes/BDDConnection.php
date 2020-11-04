<?php
//=======================
//    A Régler          /
//=======================
try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=alexis1099_questforgreen', 'alexis1099_questforgreen', 'WorkShopB3E14');
	}
	catch(Exception $e)
	{
		die('Erreur : ' .$e->getMessage());
	}
?>
