<?php

include 'BDDConnection.php';

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


		/* ---------------------- */
		/* class badge Constructeur */
		/* ---------------------- */

			Public function badge ($id_bad, $nom_bad, $desc_bad, $n_img_bad)
			{

				$this->id_badge = $id_bad;
				$this->nom_badge = $nom_bad;
				$this->description_badge = $desc_bad;
                $this->nom_image_badge = $n_img_bad;

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

			Public function get_username_badge()
			{
				return $this->username_badge;
			}

			Public function get_password_badge()
			{
				return $this->password_badge;
			}

            Public function get_xp_badge ()
            {
                return $this->xp_badge;
            }

            Public function get_points_badge()
            {
                return $this->points_badge;
			}

			Public function get_mail_badge ()
            {
                return $this->mail_badge;
            }

            Public function get_etat_badge ()
            {
                return $this->etat_badge;
            }

			/* ---------------------- */
			/* class badge SET */
			/* ---------------------- */

			Public function set_id_badge ($id_util)
			{
				 $this->id_badge = $id_util;
			}

			Public function set_username_badge ($user_util)
			{
				 $this->username_badge = $user_util;
			}

			Public function set_password_badge($pass_util)
			{
				 $this->password_badge = $pass_util;
			}

			Public function set_xp_badge ($xp_util)
			{
				 $this->date_fin_location = $date_fin_loca;
			}

			Public function set_points_badge ($pts_util)
			{
				$this->nombre_chevaux_max = $nb_che_max;
			}

			Public function set_mail_badge ($mail_util)
			{
				$this->mail_badge = $mail_util;
			}

			Public function set_etat_badge ($etat_badge)
			{
				 $this->etat_badge = $etat_badge;
			}

			/* ---------------------- */
			/* class Box fonctions publiques */
			/* ---------------------- */


			Public function ajout_badge ($objet, $conn)
				{
					$id_util = $objet->get_id_badge();
					$user_util = $objet->get_username_badge();
					$pass_util = $objet->get_password_badge();
					$xp_util = $objet->get_xp_badge();
					$pts_util = $objet->get_points_badge();
					$etat_util= $objet->get_etat_badge();


					print $SQL = " INSERT INTO badge values (NULL, '$user_util', '$pass_util', '$xp_util', '$pts_util','0')";
					$Req = $conn -> query ($SQL) or die (' Erreur ajout badge ');
				}

				Public function modif_badge ($objet, $conn)
				{
					$id_util = $objet->get_id_badge();
					$user_util = $objet->get_username_badge();
					$pass_util = $objet->get_password_badge();
					$xp_util = $objet->get_xp_badge();
					$pts_util = $objet->get_points_badge();
					$etat_util= $objet->get_etat_badge();

				
					print $SQL = "UPDATE badge SET id_badge = '$id_util', username_badge  = '$user_util', password_badge = '$pass_util'
          			xp_badge  = '$xp_util', points_badge  = '$pts_util', etat_badge  = '$etat_util'
					WHERE id_badge = '$id_util'";
				 	$Req = $conn -> query ($SQL) or die (' Erreur modification badge ');
				}

				Public function affiche_badge_total($objet, $conn)
				{
					$id_util = $objet->get_id_badge();
					$user_util = $objet->get_username_badge();
					$pass_util = $objet->get_password_badge();
					$xp_util = $objet->get_xp_badge();
					$pts_util = $objet->get_points_badge();
					$etat_util= $objet->get_etat_badge();
					

					print $SQL = " SELECT * From badge WHERE id_badge = '$id_util'";
					$Req = $conn -> query ($SQL) or die (' Erreur affichage badge ');
					return $Res = $Req -> fetch ();
				}

				Public function suppr_badge ($objet, $conn)
				{
					$id_util = $objet->get_id_badge();


					print $SQL = "UPDATE badge SET etat_badge = '1'
					WHERE id_badge = '$id_util'";
				 	$Req = $conn -> query ($SQL) or die (' Erreur suppression badge ');
				}


	/* ---------------------- */
	/* FIN class badge */
	/* ---------------------- */
}
?>
