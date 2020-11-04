<?php

include 'bdd.inc.php';

	/* ---------------------- */
	/* DEBUT class Box */
	/* ---------------------- */

class boxss
{
		/* ---------------------- */
		/* class Box Variables */
		/* ---------------------- */

		private $idboxss;
		private $nomboxss;
		private $untheme;

		/* ---------------------- */
		/* class Activites Constructeur */
		/* ---------------------- */

		public function __construct($idbox, $nombox, $idt, $lib)
		{
				$this->idboxss = $idbox;
				$this->nomboxss = $nombox;
				$theme=new theme($idt, $libt, $bdd);
				$this->$untheme = $theme;

		}

			/* ---------------------- */
			/* class Activites GET */
			/* ---------------------- */

			public function get_id_box()
			{
				return $this->idboxss;
			}

			public function get_nom_box ()
			{
				return $this->nomboxss;
			}


			/* ---------------------- */
			/* class Activites SET */
			/* ---------------------- */

			public function set_id_box ($idbox)
			{
				 $this->idboxss=$idbox;
			}

			public function set_nom_box ($nombox)
			{
				 $this->nomboxss=$nombox;
			}


			/* ---------------------- */
			/* class Box fonctions publiques */
			/* ---------------------- */


			public function ajout_boxss ($objet, $conn)
				{
					print $this->nomboxss;
					print $SQL = " INSERT INTO boxss values ('', '$this->nomboxss','1')";
					$Req = $conn->query ($SQL) or die (' Erreur ajout boxs ');
				}

				public function modif_boxss ($objet, $conn)
				{
					$idbox = $objet->get_id_box();
					$nombox = $objet->get_nom_box();

					print $SQL = "UPDATE boxss SET nomboxss  = '$nombox'
					WHERE idboxss = '$this->idboxss'";
				 	$Req = $conn->query ($SQL) or die (' Erreur modification boxs ');
				}

				public function affiche_boxss_total($objet, $conn)
				{
					$SQL = " SELECT idboxss, nomboxss From boxss WHERE etat_boxss='1' AND idboxss=".$this->idboxss;
					$Req = $conn -> query ($SQL) or die (' Erreur affichage boxs : '.$SQL);
					return $Req->fetch();
				}

				public function suppr_boxss ($objet, $conn)
				{

					print $SQL = "UPDATE boxss SET etat_boxss='0'
					WHERE idboxss='$this->idboxss'";
				 	$Req = $conn -> query ($SQL) or die (' Erreur suppression boxs ');
				}


	/* ---------------------- */
	/* FIN class articles */
	/* ---------------------- */
}
?>
