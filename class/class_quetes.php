<?php
include '../class/class_typequete.php';
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
        Private $etat_quetes;
        Private $untypequete;



		/* ---------------------- */
		/* class quetes Constructeur */
		/* ---------------------- */

			Public function __construct ($id_que, $n_que, $desc_que, $date_fin_que, $dif_que, $period_que, $amount_que, $etat_que, $id_type_que)
			{

				$this->id_quetes = $id_que;
				$this->nom_quetes = $n_que;
				$this->description_quetes = $desc_que;
                $this->date_fin_quetes = $date_fin_que;
                $this->difficulte_quetes = $dif_que;
                $this->periode_quetes = $period_que;
                $this->amount_quetes = $amount_que;
                $this->etat_quetes = $etat_que;
                //$typequete=new typequetes($id_typ_que, $titre_typ_que, $bdd);
                //$this->$untypequete = $typequete;

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
                $data = $data.$this->amount_quetes;
                $data = $data.$this->etat_que;
				$data = $data.$this->typequetes;

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

			Public function get_amount_quetes ()
            {
                return $this->amount_quetes;
            }

            Public function get_etat_quetes ()
            {
                return $this->etat_quetes;
            }

            Public function get_type_quetes ()
            {
                return $this->id_type_quetes;
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
            
            Public function set_etat_quetes ($etat_que)
			{
				$this->etat_quetes = $etat_que;
			}

			Public function set_types_quetes ($typequete)
			{
				 $this->id_type_quetes = $typequete;
			}

			/* ---------------------- */
			/* class Box fonctions publiques */
			/* ---------------------- */


			Public function ajout_quetes ($objet, $bdd)
				{
					$id_que = $objet->get_id_quetes();
					$n_que = $objet->get_nom_quetes();
					$desc_que = $objet->get_description_quetes();
					$date_fin_que = $objet->get_date_fin_quetes();
					$dif_que = $objet->get_difficulte_quetes();
					$period_que = $objet->get_periode_quetes();
					$niv = $objet->get_niv();
                    $amount_que = $objet->get_amount_quetes();
                    $etat_que = $objet->get_etat_quetes();
					$typequete= $objet->get_type_quetes();


					print $SQL = " INSERT INTO quetes values (NULL, '$n_que', '$desc_que', '$date_fin_que', '$dif_que', '$period_que', '$niv', '$amount_que', '0', '$typequetes')";
					$Req = $bdd -> query ($SQL) or die (' Erreur ajout quetes ');
				}

				Public function modif_quetes ($objet, $bdd)
				{
					$id_que = $objet->get_id_quetes();
					$n_que = $objet->get_nom_quetes();
					$desc_que = $objet->get_description_quetes();
					$date_fin_que = $objet->get_date_fin_quetes();
					$dif_que = $objet->get_difficulte_quetes();
					$period_que = $objet->get_periode_quetes();
					$niv = $objet->get_niv();
                    $amount_que = $objet->get_amount_quetes();
                    $etat_que = $objet->get_etat_quetes();
					$typequete= $objet->get_type_quetes();
				
					print $SQL = "UPDATE quetes SET id_quetes = '$id_que', nom_quetes  = '$n_que', description_quetes = '$desc_que',
          			date_fin_quetes = '$date_fin_que', difficulte_quetes = '$dif_que', periode_quetes = '$period_que', niv = '$niv',
                    amount_quetes = '$amount_que',  typequete = '$typequete'
					WHERE id_quetes = '$id_que'";
				 	$Req = $bdd -> query ($SQL) or die (' Erreur modification quetes ');
				}

				Public function affiche_quetes_total($objet, $bdd)
				{
					$id_que = $objet->get_id_quetes();
					$n_que = $objet->get_nom_quetes();
					$desc_que = $objet->get_description_quetes();
					$date_fin_que = $objet->get_date_fin_quetes();
					$dif_que = $objet->get_difficulte_quetes();
					$period_que = $objet->get_periode_quetes();
					$niv = $objet->get_niv();
					$amount_que = $objet->get_amount_quetes();
					$typequete= $objet->get_type_quetes();
					

					print $SQL = " SELECT * From quetes WHERE id_quetes = '$id_que'";
					$Req = $bdd -> query ($SQL) or die (' Erreur affichage quetes ');
					return $Res = $Req -> fetch ();
				}

				public function tslesquetes($bdd)
				{
					$SQL="SELECT * FROM quetes ORDER BY etat_quetes, nom_quetes";
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
