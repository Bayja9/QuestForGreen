<?php
include 'class_utilisateur.php';
include '../includes/BDDConnection.php';

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

			Public function __construct ($id_bad, $n_bad, $desc_bad, $n_img_bad, $id_util, $etat_bad, $user_util, $pass_util, $xp_util, $pts_util, $mail_util, $niv_util, $n_img, $etat_util, $bdd)
			{

				$this->id_badge = $id_bad;
				$this->nom_badge = $n_bad;
				$this->description_badge = $desc_bad;
				$this->nom_image_badge = $n_img_bad;
				$this->etat_badge = $etat_bad;
				$utilisateur=new utilisateur($id_util, $pass_util, $user_util, $xp_util, $pts_util, $mail_util, $niv_util, $n_img, $etat_util, $bdd);
				$unutilisateur=$utilisateur;
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
			
			//Public function get_utilisateur ()
            //{
            //    return $this->id_utilisateur;
            //}

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
					//$utilisateur = $objet->get_utilisateur();


					print $SQL = "INSERT INTO badge (nom_badge, description_badge, nom_image_badge, id_utilisateur) values ('$nom_badge','$description_badge','$nom_image_badge','0')";
					$Req = $bdd -> query ($SQL) or die (' Erreur ajout badge ');
				}

				Public function modif_badge ($objet, $bdd)
				{
					$id_badge = $objet->get_id_badge();
					$nom_badge = $objet->get_nom_badge();
					$description_badge = $objet->get_description_badge();
					$nom_image_badge = $objet->get_nom_image_badge();
					$etat_badge = $objet->get_etat_badge();
					//$utilisateur = $objet->get_utilisateur();
				

					$SQL = "UPDATE badge SET id_badge = '$id_badge', nom_badge  = '$nom_badge', description_badge = '$description_badge',
          			nom_image_badge  = '$nom_image_badge'
					WHERE id_badge = '$id_badge'";
				 	$Req = $bdd -> query ($SQL) or die (' Erreur modification badge ');
				}

				Public function affiche_badge_total($objet, $bdd)
				{
					$id_badge = $objet->get_id_badge();
					$nom_badge = $objet->get_nom_badge();
					$description_badge = $objet->get_description_badge();
					$nom_image_badge = $objet->get_nom_image_badge();
					$etat_bad = $objet->get_etat_badge();
					//$utilisateur = $objet->get_utilisateur();
					

					$SQL = " SELECT * From badge WHERE id_badge = '$id_badge'";
					$Req = $bdd -> query ($SQL) or die (' Erreur affichage badge ');
					return $Res = $Req -> fetch ();
				}

				public function tslesbadges($bdd)
				{
					$SQL="SELECT * FROM badge WHERE etat_badge = '0'";
					$req = $bdd->query($SQL);
					return $req;
				}

				Public function suppr_badge ($objet, $bdd)
				{
					$id_badge = $objet->get_id_badge();
					//$utilisateur = $objet->get_utilisateur();


					print $SQL = "UPDATE badge SET etat_badge = '1'
					WHERE id_badge = '$id_badge'";
				 	$Req = $bdd -> query ($SQL) or die (' Erreur suppression badge ');
				}


	/* ---------------------- */
	/* FIN class badge */
	/* ---------------------- */
}
?>
