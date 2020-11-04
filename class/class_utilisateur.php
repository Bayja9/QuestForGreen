<?php

include '../includes/BDDconnection.php';

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
		Private $niv_util;
		Private $nom_image;
        Private $etat_utilisateur;



		/* ---------------------- */
		/* class utilisateur Constructeur */
		/* ---------------------- */

			Public function __construct($id_util, $user_util, $pass_util, $xp_util, $pts_util, $mail_util, $niv_util , $n_img, $etat_util)
			{

				$this->id_utilisateur = $id_util;
				$this->username_utilisateur = $user_util;
				$this->password_utilisateur = $pass_util;
                $this->xp_utilisateur = $xp_util;
                $this->points_utilisateur = $pts_util;
				$this->mail_utilisateur = $mail_util;
				$this->niv_util = $niv_util;
				$this->nom_image = $n_img;
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
				$data = $data.$this->niv_util;
				$data = $data.$this->nom_image;
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
			
			Public function get_niv ()
            {
                return $this->niv_util;
            }

			Public function get_nom_image ()
            {
                return $this->nom_image;
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

			Public function set_niv ($niv_util)
			{
				$this->niv = $niv_util;
			}

			Public function set_nom_image ($n_img)
			{
				$this->nom_image = $n_img;
			}

			Public function set_etat_utilisateur ($etat_utilisateur)
			{
				 $this->etat_utilisateur = $etat_utilisateur;
			}

			/* ---------------------- */
			/* class Box fonctions publiques */
			/* ---------------------- */


			Public function ajout_utilisateur ($objet, $bdd)
				{
					$id_util = $objet->get_id_utilisateur();
					$user_util = $objet->get_username_utilisateur();
					$pass_util = $objet->get_password_utilisateur();
					$xp_util = $objet->get_xp_utilisateur();
					$pts_util = $objet->get_points_utilisateur();
					$mail_util = $objet->get_point_utilisateur();
					$niv = $objet->get_niv();
					$n_img = $objet->get_nom_image();
					$etat_util= $objet->get_etat_utilisateur();


					print $SQL = " INSERT INTO utilisateur values (NULL, '$user_util', '$pass_util', '$xp_util', '$pts_util', '$mail_util', '$niv', '$n_img',0')";
					$Req = $bdd -> query ($SQL) or die (' Erreur ajout utilisateur ');
				}

				Public function modif_utilisateur ($objet, $bdd)
				{
					$id_util = $objet->get_id_utilisateur();
					$user_util = $objet->get_username_utilisateur();
					$mail_util = $objet->get_mail_utilisateur();
					$xp_util = $objet->get_xp_utilisateur();
					$pts_util = $objet->get_points_utilisateur();
					$mail_util = $objet->get_mail_utilisateur();
					$niv = $objet->get_niv();
					$n_img = $objet->get_nom_image();
					$etat_util= $objet->get_etat_utilisateur();

				
					$SQL = "UPDATE utilisateur SET id_utilisateur = '$id_util', username_utilisateur  = '$user_util',
          			xp_utilisateur = '$xp_util', points_utilisateur = '$pts_util', mail_utilisateur = '$mail_util', niv = '$niv', nom_image = '$n_img', etat_utilisateur  = '$etat_util'
					WHERE id_utilisateur = '$id_util'";
				 	$Req = $bdd -> query ($SQL) or die (' Erreur modification utilisateur ');
				}

				Public function affiche_utilisateur_total($objet, $bdd)
				{
					$id_util = $objet->get_id_utilisateur();
					$user_util = $objet->get_username_utilisateur();
					$pass_util = $objet->get_password_utilisateur();
					$mail_util = $objet->get_mail_utilisateur();
					$xp_util = $objet->get_xp_utilisateur();
					$pts_util = $objet->get_points_utilisateur();
					$mail_util = $objet->get_mail_utilisateur();
					$niv = $objet->get_niv();
					$n_img = $objet->get_nom_image();
					$etat_util= $objet->get_etat_utilisateur();
					

					$SQL = " SELECT * From utilisateur WHERE id_utilisateur = '$id_util'";
					$Req = $bdd -> query ($SQL) or die (' Erreur affichage utilisateur ');
					return $Res = $Req -> fetch ();
				}

				public function tslesutilisateurs($bdd)
				{
					$SQL="SELECT * FROM utilisateur WHERE etat_utilisateur='0' OR etat_utilisateur='2' ORDER BY etat_utilisateur,username_utilisateur";
					$req = $bdd->query($SQL);
					return $req;
				}

				Public function suppr_utilisateur ($objet, $bdd)
				{
					$id_util = $objet->get_id_utilisateur();


					$SQL = "UPDATE utilisateur SET etat_utilisateur = '1'
					WHERE id_utilisateur = '$id_util'";
				 	$Req = $bdd -> query ($SQL) or die (' Erreur suppression utilisateur ');
				}


	/* ---------------------- */
	/* FIN class utilisateur */
	/* ---------------------- */
}
?>
