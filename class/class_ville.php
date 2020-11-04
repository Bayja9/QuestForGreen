<?php

include 'bdd.inc.php';

	/* ---------------------- */
	/* DEBUT class Ville */
	/* ---------------------- */

class ville
{
		/* ---------------------- */
		/* class Ville Variables */
		/* ---------------------- */

		Private $ville_id;
		Private $ville_departement;
		Private $ville_nom;
		Private $ville_code_postal;
		Private $ville_code_commune;
		Private $ville_arrondissement;

		/* ---------------------- */
		/* class Ville Constructeur */
		/* ---------------------- */

			Public function ville ( $id_ville, $dep_ville, $nom_ville, $cp_ville, $code_comm_ville, $arron_ville)
			{
				$this -> ville_id = $id_ville;
				$this -> ville_departement = $dep_ville;
				$this -> ville_nom = $nom_ville;
				$this -> ville_code_postal = $cp_ville;
				$this -> ville_code_commune = $code_comm_ville;
				$this -> ville_arrondissement = $arron_ville;
			}

			/* ---------------------- */
			/* fonction Ville getalldata */
			/* ---------------------- */

			public function getallville()
			{
				$data = $this->ville_id;
				$data = $data.$this->ville_departement;
				$data = $data.$this->ville_nom;
				$data = $data.$this->ville_code_postal;
				$data = $data.$this->ville_code_commune;
				$data = $data.$this->ville_arrondissement;

				return $data;
			}

			/* ---------------------- */
			/* class Ville GET */
			/* ---------------------- */

			Public function get_id_ville ()
			{
				return $this-> ville_id;
			}

			Public function get_departement_ville ()
			{
				return $this-> ville_departement;
			}

			Public function get_nom_ville ()
			{
				return $this-> ville_nom;
			}

			Public function  get_code_postal_ville ()
			{
				return $this-> ville_code_postal;
			}

			Public function  get_code_commune_ville()
			{
				return $this-> ville_code_commune;
			}

			Public function  get_arrondissement_ville()
			{
				return $this-> ville_arrondissement;
			}


			/* ---------------------- */
			/* class Ville SET */
			/* ---------------------- */

			Public function set_id_ville ($id_ville)
			{
				 $this-> ville_id = $id_ville;
			}

			Public function set_departement_ville ($dep_ville)
			{
				 $this-> ville_departement = $dep_ville;
			}

			Public function set_nom_ville ($nom_ville)
			{
				 $this-> ville_nom = $nom_ville;
			}

			Public function set_code_postal_ville ($cp_ville)
			{
				 $this-> ville_code_postal = $cp_ville;
			}

			Public function set_code_commune_ville ($code_comm_ville)
			{
				 $this-> ville_code_postal = $code_comm_ville;
			}

			Public function set_arrondissement_ville ($arron_ville)
			{
				 $this-> ville_arrondissement = $arron_ville;
			}


			/* ---------------------- */
			/* class Ville fonctions publiques */
			/* ---------------------- */


			Public function ajout_ville ($objet, $conn)
				{
					$ville_id = $objet->get_id_ville();
					$ville_departement = $objet->get_departement_ville();
					$ville_nom = $objet->get_nom_ville();
					$ville_code_postal = $objet->get_code_postal_ville();
					$ville_code_commune = $objet->get_code_commune_ville();
					$ville_arrondissement = $objet->get_arrondissement_ville();

					print $SQL = " INSERT INTO ville values (NULL, '$ville_departement', '$ville_nom' , '$ville_code_postal', '$ville_code_commune', '$ville_arrondissement'())";
					$Req = $conn -> query ($SQL) or die (' Erreur ajout ville ');
				}

				Public function modif_ville ($objet, $conn)
				{
					$ville_id = $objet->get_id_ville();
					$ville_departement = $objet->get_departement_ville();
					$ville_nom = $objet->get_nom_ville();
					$ville_code_postal = $objet->get_code_postal_ville();
					$ville_code_commune = $objet->get_code_commune_ville();
					$ville_arrondissement = $objet->get_arrondissement_ville();

					print $SQL = "UPDATE ville SET ville_id = '$id_ville', ville_departement  = '$ville_departement',
					ville_nom = '$ville_nom', ville_code_postal = '$ville_code_postal', ville_code_commune = '$ville_code_commune', ville_arrondissement = '$ville_arrondissement'
					WHERE ville_id = '$ville_id'";
				 	$Req = $conn -> query ($SQL) or die (' Erreur modification ville ');
				}

				Public function affiche_ville_total($objet, $conn)
				{
					$ville_id = $objet->get_id_ville();
					$ville_departement = $objet->get_departement_ville();
					$ville_nom = $objet->get_nom_ville();
					$ville_code_postal = $objet->get_code_postal_ville();
					$ville_code_commune = $objet->get_code_commune_ville();
					$ville_arrondissement = $objet->get_arrondissement_ville();

					print $SQL = " SELECT ville_id, ville_departement, ville_nom, ville_code_postal,
					ville_code_commune, ville_arrondissement FROM ville WHERE id_ville = '$id_ville'";
					$Req = $conn -> query ($SQL) or die (' Erreur affichage ville ');
					return $Res = $Req -> fetch ();
				}

			//	Public function suppr_ville ($objet, $conn)
				//{
				//	$ville_id = $objet->get_id_ville();

					//print $SQL = "UPDATE ville SET etat_ville = '1'
					//WHERE ville_id = '$id_ville'";
				 	//$Req = $conn -> query ($SQL) or die (' Erreur suppression ville ');
				//}


	/* ---------------------- */
	/* FIN class Ville */
	/* ---------------------- */
}
?>
