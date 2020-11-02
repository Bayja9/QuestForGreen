<?php
//=======================
//    A Régler          /
//=======================
try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=test_login', 'root', '');
	}
	catch(Exception $e)
	{
		die('Erreur : ' .$e->getMessage());
	}
?>