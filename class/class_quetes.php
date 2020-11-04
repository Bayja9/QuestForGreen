<?php

include '../includes/BDDconnection.php';

	/* ---------------------- */
	/* DEBUT class quetes */
	/* ---------------------- */

class quetes
{
		/* ---------------------- */
		/* class quetes Variables */
		/* ---------------------- */

		Private $id_quetes;
		Private $nom_quetes;
		Private $description_quetes;
        Private $date_fin_quetes;
        Private $difficulte_quetes;
		Private $periode_quetes;
		Private $amount_quetes;
        Private $untypequete;



		/* ---------------------- */
		/* class quetes Constructeur */
		/* ---------------------- */

			Public function __construct ($id_que, $n_que, $desc_que, $date_fin_que, $dif_que, $period_que, $niv, $amount_que, $etat_que)
			{

				$this->id_quetes = $id_que;
				$this->nom_quetes = $n_que;
				$this->description_quetes = $desc_que;
                $this->date_fin_quetes = $date_fin_que;
                $this->difficulte_quetes = $dif_que;
                $this->periode_quetes = $period_que;
                $this->niv = $niv;
				$this->amount_quetes = $amount_que;
                $typequete=new typequetes($id_typ_que, $titre_typ_que, $bdd);


			}

			/* ---------------------- */
			/* fonction quetes getalldata */
			/* ---------------------- */

			public function getallquetes()
			{
				$data = $this->id_quetes;
				$data = $data.$this->nom_quetes;
				$data = $data.$this->description_quetes;
                $data = $data.$this->date_fin_quetes;
                $data = $data.$this->difficulte_quetes;
				$data = $data.$this->periode_quetes;
				$data = $data.$this->niv;
				$data = $data.$this->amount_quetes;
				$data = $data.$this->type_quetes;

				return $data;
			}

			/* ---------------------- */
			/* class quetes GET */
			/* ---------------------- */

			Public function get_id_quetes()
			{
				return $this->id_quetes;
			}

			Public function get_nom_quetes()
			{
				return $this->nom_quetes;
			}

			Public function get_description_quetes()
			{
				return $this->description_quetes;
			}

            Public function get_difficulte_quetes ()
            {
                return $this->difficulte_quetes;
            }

            Public function get_periode_quetes()
            {
                return $this->periode_quetes;
			}

			Public function get_niv ()
            {
                return $this->niv;
			}
			
			Public function get_niv ()
            {
                return $this->niv;
            }

			Public function get_amount_quetes ()
            {
                return $this->amount_quetes;
            }

			/* ---------------------- */
			/* class quetes SET */
			/* ---------------------- */

			Public function set_id_quetes ($id_que)
			{
				 $this->id_quetes = $id_que;
			}

			Public function set_nom_quetes ($n_que)
			{
				 $this->nom_quetes = $n_que;
			}

			Public function set_password_quetes($pass_que)
			{
				 $this->password_quetes = $pass_que;
			}

			Public function set_xp_quetes ($xp_que)
			{
				 $this->date_fin_location = $date_fin_loca;
			}

			Public function set_points_quetes ($pts_que)
			{
				$this->nombre_chevaux_max = $nb_che_max;
			}

			Public function set_mail_quetes ($mail_que)
			{
				$this->mail_quetes = $mail_que;
			}

			Public function set_niv ($niv)
			{
				$this->niv = $niv;
			}

			Public function set_nom_image ($n_img)
			{
				$this->nom_image = $n_img;
			}

			Public function set_etat_quetes ($etat_quetes)
			{
				 $this->etat_quetes = $etat_quetes;
			}

			/* ---------------------- */
			/* class Box fonctions publiques */
			/* ---------------------- */


			Public function ajout_quetes ($objet, $bdd)
				{
					$id_que = $objet->get_id_quetes();
					$user_que = $objet->get_username_quetes();
					$pass_que = $objet->get_password_quetes();
					$xp_que = $objet->get_xp_quetes();
					$pts_que = $objet->get_points_quetes();
					$mail_que = $objet->get_point_quetes();
					$niv = $objet->get_niv();
					$n_img = $onjet->get_nom_image();
					$etat_que= $objet->get_etat_quetes();


					print $SQL = " INSERT INTO quetes values (NULL, '$user_que', '$pass_que', '$xp_que', '$pts_que', '$mail_que', '$niv', '$n_img',0')";
					$Req = $bdd -> query ($SQL) or die (' Erreur ajout quetes ');
				}

				Public function modif_quetes ($objet, $bdd)
				{
					$id_que = $objet->get_id_quetes();
					$user_que = $objet->get_username_quetes();
					$pass_que = $objet->get_password_quetes();
					$xp_que = $objet->get_xp_quetes();
					$pts_que = $objet->get_points_quetes();
					$mail_que = $objet->get_point_quetes();
					$niv = $objet->get_niv();
					$n_img = $onjet->get_nom_image();
					$etat_que= $objet->get_etat_quetes();

				
					print $SQL = "UPDATE quetes SET id_quetes = '$id_que', username_quetes  = '$user_que', password_quetes = '$pass_que',
          			xp_quetes = '$xp_que', points_quetes = '$pts_que', mail_quetes = '$mail_que', niv = '$niv', nom_image = '$n_img', etat_quetes  = '$etat_que'
					WHERE id_quetes = '$id_que'";
				 	$Req = $bdd -> query ($SQL) or die (' Erreur modification quetes ');
				}

				Public function affiche_quetes_total($objet, $bdd)
				{
					$id_que = $objet->get_id_quetes();
					$user_que = $objet->get_username_quetes();
					$pass_que = $objet->get_password_quetes();
					$xp_que = $objet->get_xp_quetes();
					$pts_que = $objet->get_points_quetes();
					$mail_que = $objet->get_point_quetes();
					$niv = $objet->get_niv();
					$n_img = $onjet->get_nom_image();
					$etat_que= $objet->get_etat_quetes();
					

					print $SQL = " SELECT * From quetes WHERE id_quetes = '$id_que'";
					$Req = $bdd -> query ($SQL) or die (' Erreur affichage quetes ');
					return $Res = $Req -> fetch ();
				}

				public function tslesquetess($bdd)
				{
					$SQL="SELECT * FROM quetes ORDER BY etat_quetes,username_quetes";
					$req = $bdd->query($SQL);
					return $req;
				}

				Public function suppr_quetes ($objet, $bdd)
				{
					$id_que = $objet->get_id_quetes();


					print $SQL = "UPDATE quetes SET etat_quetes = '1'
					WHERE id_quetes = '$id_que'";
				 	$Req = $bdd -> query ($SQL) or die (' Erreur suppression quetes ');
				}


	/* ---------------------- */
	/* FIN class quetes */
	/* ---------------------- */
}
?>
