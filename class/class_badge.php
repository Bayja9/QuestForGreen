<?php

<<<<<<< HEAD
include "../includes/BDDconnection.php";
=======
include '../includes/BDDConnection.php';
>>>>>>> dfd43530311e6653bc6cfc12c79340db855fde12

	/* ---------------------- */
	/* DEBUT class badge */
	/* ---------------------- */

class badge
{
		/* ---------------------- */
		/* class badge Variables */
		/* ---------------------- */

		Private $id_badge;
		Private $nom_badge;
		Private $description_badge;
		Private $nom_image_badge;
		Private $etat_badge;
		Private $unutilisateur;


		/* ---------------------- */
		/* class badge Constructeur */
		/* ---------------------- */

			Public function __construct ($id_bad, $n_bad, $desc_bad, $n_img_bad, $id_util, $etat_badge, $user_util, $pass_util, $xp_util, $pts_util, $mail_util, $niv_util, $n_img, $etat_util, $bdd)
			{

				$this->id_badge = $id_bad;
				$this->nom_badge = $n_bad;
				$this->description_badge = $desc_bad;
				$this->nom_image_badge = $n_img_bad;
				$this->etat_badge = $etat_bad;
				$utilisateur=new utilisateur($id_util, $user_util, $pass_util, $xp_util, $pts_util, $mail_util, $niv_util, $n_img, $etat_util, $bdd)
				$this->$unutilisateur = $utilisateur;
			}

			/* ---------------------- */
			/* fonction badge getalldata */
			/* ---------------------- */

			public function getallbadge()
			{
				$data = $this->id_badge;
				$data = $data.$this->nom_badge;
				$data = $data.$this->description_badge;
                $data = $data.$this->nom_image_badge;


				return $data;
			}

			/* ---------------------- */
			/* class badge GET */
			/* ---------------------- */

			Public function get_id_badge()
			{
				return $this->id_badge;
			}

			Public function get_nom_badge()
			{
				return $this->nom_badge;
			}

			Public function get_description_badge()
			{
				return $this->description_badge;
			}

            Public function get_nom_image_badge ()
            {
                return $this->nom_image_badge;
			}

			Public function get_etat_badge ()
            {
                return $this->etat_badge;
			}
			
			Public function get_utilisateur ()
            {
                return $this->id_utilisateur;
            }

			/* ---------------------- */
			/* class badge SET */
			/* ---------------------- */

			Public function set_id_badge ($id_bad)
			{
				 $this->id_badge = $id_bad;
			}

			Public function set_nom_badge ($n_badge)
			{
				 $this->nom_badge = $n_badge;
			}

			Public function set_description_badge ($desc_bad)
			{
				 $this->description_badge = $desc_bad;
			}

			Public function set_nom_image_badge ($n_img_bad)
			{
				 $this->nom_image_badge = $n_img_bad;
			}

			Public function set_etat_badge ($etat_bad)
			{
				 $this->etat_badge = $etat_bad;
			}

			Public function set_utilisateur ($utilisateur)
			{
				 $this->id_utilisateur = $utilisateur;
			}


			/* ---------------------- */
			/* class Box fonctions publiques */
			/* ---------------------- */


			Public function ajout_badge ($objet, $bdd)
				{
					$id_badge = $objet->get_id_badge();
					$nom_badge = $objet->get_nom_badge();
					$description_badge = $objet->get_description_badge();
					$nom_image_badge = $objet->get_nom_image_badge();
					$etat_bad = $objet->get_etat_badge();
					$utilisateur = $objet->get_utilisateur();


<<<<<<< HEAD
					print $SQL = " INSERT INTO badge values (NULL, '$n_badge', '$desc_badge', '$nom_image_badge')";
=======
					print $SQL = " INSERT INTO badge values (NULL, '$n_badge', '$desc_badge', '$nom_image_badge', '0', '$utilisateur')";
>>>>>>> dfd43530311e6653bc6cfc12c79340db855fde12
					$Req = $bdd -> query ($SQL) or die (' Erreur ajout badge ');
				}

				Public function modif_badge ($objet, $bdd)
				{
					$id_badge = $objet->get_id_badge();
					$nom_badge = $objet->get_nom_badge();
					$description_badge = $objet->get_description_badge();
					$nom_image_badge = $objet->get_nom_image_badge();
					$etat_bad = $objet->get_etat_badge();
					$utilisateur = $objet->get_utilisateur();
				

					print $SQL = "UPDATE badge SET id_badge = '$id_bad', nom_badge  = '$n_badge', description_badge = '$desc_badge'
          			nom_image_badge  = '$n_img_bad'
					WHERE id_badge = '$id_util'";
				 	$Req = $bdd -> query ($SQL) or die (' Erreur modification badge ');
				}

				Public function affiche_badge_total($objet, $bdd)
				{
					$id_badge = $objet->get_id_badge();
					$nom_badge = $objet->get_nom_badge();
					$description_badge = $objet->get_description_badge();
					$nom_image_badge = $objet->get_nom_image_badge();
					$etat_bad = $objet->get_etat_badge();
					$utilisateur = $objet->get_utilisateur();
					

					print $SQL = " SELECT * From badge WHERE id_badge = '$id_bad'";
					$Req = $bdd -> query ($SQL) or die (' Erreur affichage badge ');
					return $Res = $Req -> fetch ();
				}

<<<<<<< HEAD
				public function tslesbadges($bdd)
				{
					$SQL="SELECT * FROM badge WHERE etat_badge = '0'";
					$req = $bdd->query($SQL);
					return $req;
				}

=======
>>>>>>> dfd43530311e6653bc6cfc12c79340db855fde12
				Public function suppr_badge ($objet, $bdd)
				{
					$id_badge = $objet->get_id_badge();
					$utilisateur = $objet->get_utilisateur();


					print $SQL = "UPDATE badge SET etat_badge = '1'
<<<<<<< HEAD
					WHERE id_badge = '$id_badge'";
=======
					WHERE id_badge = '$id_bad'";
>>>>>>> dfd43530311e6653bc6cfc12c79340db855fde12
				 	$Req = $bdd -> query ($SQL) or die (' Erreur suppression badge ');
				}


	/* ---------------------- */
	/* FIN class badge */
	/* ---------------------- */
}
?>
