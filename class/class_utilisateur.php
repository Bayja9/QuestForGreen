<?php

include 'BDDConnection.php';

	/* ---------------------- */
	/* DEBUT class utilisateur */
	/* ---------------------- */

class utilisateur
{
		/* ---------------------- */
		/* class utilisateur Variables */
		/* ---------------------- */

		Private $id_utilisateur;
		Private $username_utilisateur;
		Private $password_utilisateur;
        Private $xp_utilisateur;
        Private $points_utilisateur;
        Private $mail_utilisateur;
        Private $etat_utilisateur;



		/* ---------------------- */
		/* class utilisateur Constructeur */
		/* ---------------------- */

			Public function __construct ($id_util, $user_util, $pass_util, $xp_util, $pts_util, $mail_util, $etat_util)
			{

				$this->id_utilisateur = $id_util;
				$this->username_utilisateur = $user_util;
				$this->password_utilisateur = $pass_util;
                $this->xp_utilisateur = $xp_util;
                $this->points_utilisateur = $pts_util;
                $this->mail_utilisateur = $mail_util;
                $this->etat_utilisateur = $etat_util;

			}

			/* ---------------------- */
			/* fonction utilisateur getalldata */
			/* ---------------------- */

			public function getallutilisateur()
			{
				$data = $this->id_utilisateur;
				$data = $data.$this->username_utilisateur;
				$data = $data.$this->password_utilisateur;
                $data = $data.$this->xp_utilisateur;
                $data = $data.$this->points_utilisateur;
                $data = $data.$this->mail_utilisateur;
				$data = $data.$this->etat_utilisateur;

				return $data;
			}

			/* ---------------------- */
			/* class utilisateur GET */
			/* ---------------------- */

			Public function get_id_utilisateur()
			{
				return $this->id_utilisateur;
			}

			Public function get_username_utilisateur()
			{
				return $this->username_utilisateur;
			}

			Public function get_password_utilisateur()
			{
				return $this->password_utilisateur;
			}

            Public function get_xp_utilisateur ()
            {
                return $this->xp_utilisateur;
            }

            Public function get_points_utilisateur()
            {
                return $this->points_utilisateur;
			}

			Public function get_mail_utilisateur ()
            {
                return $this->mail_utilisateur;
            }

            Public function get_etat_utilisateur ()
            {
                return $this->etat_utilisateur;
            }

			/* ---------------------- */
			/* class utilisateur SET */
			/* ---------------------- */

			Public function set_id_utilisateur ($id_util)
			{
				 $this->id_utilisateur = $id_util;
			}

			Public function set_username_utilisateur ($user_util)
			{
				 $this->username_utilisateur = $user_util;
			}

			Public function set_password_utilisateur($pass_util)
			{
				 $this->password_utilisateur = $pass_util;
			}

			Public function set_xp_utilisateur ($xp_util)
			{
				 $this->date_fin_location = $date_fin_loca;
			}

			Public function set_points_utilisateur ($pts_util)
			{
				$this->nombre_chevaux_max = $nb_che_max;
			}

			Public function set_mail_utilisateur ($mail_util)
			{
				$this->mail_utilisateur = $mail_util;
			}

			Public function set_etat_utilisateur ($etat_utilisateur)
			{
				 $this->etat_utilisateur = $etat_utilisateur;
			}

			/* ---------------------- */
			/* class Box fonctions publiques */
			/* ---------------------- */


			Public function ajout_utilisateur ($objet, $conn)
				{
					$id_util = $objet->get_id_utilisateur();
					$user_util = $objet->get_username_utilisateur();
					$pass_util = $objet->get_password_utilisateur();
					$xp_util = $objet->get_xp_utilisateur();
					$pts_util = $objet->get_points_utilisateur();
					$etat_util= $objet->get_etat_utilisateur();


					print $SQL = " INSERT INTO utilisateur values (NULL, '$user_util', '$pass_util', '$xp_util', '$pts_util','0')";
					$Req = $conn -> query ($SQL) or die (' Erreur ajout utilisateur ');
				}

				Public function modif_utilisateur ($objet, $conn)
				{
					$id_util = $objet->get_id_utilisateur();
					$user_util = $objet->get_username_utilisateur();
					$pass_util = $objet->get_password_utilisateur();
					$xp_util = $objet->get_xp_utilisateur();
					$pts_util = $objet->get_points_utilisateur();
					$etat_util= $objet->get_etat_utilisateur();

				
					print $SQL = "UPDATE utilisateur SET id_utilisateur = '$id_util', username_utilisateur  = '$user_util', password_utilisateur = '$pass_util',
          			etat_utilisateur  = '$etat_util'
					WHERE id_utilisateur = '$id_util'";
				 	$Req = $conn -> query ($SQL) or die (' Erreur modification utilisateur ');
				}

				Public function affiche_utilisateur_total($objet, $conn)
				{
					$id_util = $objet->get_id_utilisateur();
					$user_util = $objet->get_username_utilisateur();
					$pass_util = $objet->get_password_utilisateur();
					$xp_util = $objet->get_xp_utilisateur();
					$pts_util = $objet->get_points_utilisateur();
					$etat_util= $objet->get_etat_utilisateur();
					

					print $SQL = " SELECT * From utilisateur WHERE id_utilisateur = '$id_util'";
					$Req = $conn -> query ($SQL) or die (' Erreur affichage utilisateur ');
					return $Res = $Req -> fetch ();
				}

				Public function suppr_utilisateur ($objet, $conn)
				{
					$id_util = $objet->get_id_utilisateur();


					print $SQL = "UPDATE utilisateur SET etat_utilisateur = '1'
					WHERE id_utilisateur = '$id_util'";
				 	$Req = $conn -> query ($SQL) or die (' Erreur suppression utilisateur ');
				}


	/* ---------------------- */
	/* FIN class utilisateur */
	/* ---------------------- */
}
?>
