<?php
include '../class/class_type_quetes.php';
include '../includes/BDDConnection.php';

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

			Public function __construct ($id_que, $n_que, $desc_que, $date_fin_que, $dif_que, $period_que, $amount_que, $etat_que, $id_typ_que, $tit_typ_que, $bdd)
			{

				$this->id_quetes = $id_que;
				$this->nom_quetes = $n_que;
				$this->description_quetes = $desc_que;
                $this->date_fin_quetes = $date_fin_que;
                $this->difficulte_quetes = $dif_que;
                $this->periode_quetes = $period_que;
                $this->amount_quetes = $amount_que;
                $this->etat_quetes = $etat_que;
                $typequete=new typequete($id_typ_que, $tit_typ_que, $bdd);
                $this->untypequete = $typequete;

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

			Public function get_date_fin_quetes ()
            {
                return $this->date_fin_quetes;
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

			Public function set_nom_image ($n_img)
			{
				$this->nom_image = $n_img;
            }
            
            Public function set_etat_quetes ($etat_que)
			{
				$this->etat_quetes = $etat_que;
			}


			/* ---------------------- */
			/* class Box fonctions publiques */
			/* ---------------------- */


			Public function ajout_quetes ($objet, $bdd)
				{
					$n_que = $objet->get_nom_quetes();
					$desc_que = $objet->get_description_quetes();
					$dif_que = $objet->get_difficulte_quetes();
					$period_que = $objet->get_periode_quetes();
                    $amount_que = $objet->get_amount_quetes();

					if ($period_que == 'principale')
					{
						$id_type_que = 1;
					}
					if ($period_que == 'journaliere')
					{
						$id_type_que = 2;
					}
					if ($period_que == 'hebdomadaire')
					{
						$id_type_que = 3;
					}
					if ($period_que == 'mensuelle')
					{
						$id_type_que = 4;
					}

					$date = new DateTime(date('Y-m-d'));
					
					if ($period_que=='principale') {
						$date_fin_que='NULL';
					}
					if ($period_que=='journaliere') {
						$date->add(new DateInterval('P1D'));
						$date2 = $date->format('Y-m-d') . "\n";
						$date_fin_que=$date2;
					}
					if ($period_que=='hebdomadaire') {
						$date->add(new DateInterval('P7D'));
						$date2 = $date->format('Y-m-d') . "\n";
						$date_fin_que=$date2;
					}
					if ($period_que=='mensuelle') {
						$date->add(new DateInterval('P30D'));
						$date2 = $date->format('Y-m-d') . "\n";
						$date_fin_que=$date2;
					}

					$SQL = $bdd->prepare("INSERT INTO quetes ( nom_quetes, description_quetes, difficulte_quetes, periode_quetes, amount_quetes, id_type_quetes ) 
										  values (:n_que, :desc_que, :dif_que, :period_que, :amount_que, :id_type_que)");

					$SQL->bindParam(':n_que', $n_que);
					$SQL->bindParam(':desc_que', $desc_que);
					$SQL->bindParam(':dif_que', $dif_que);
					$SQL->bindParam(':period_que', $period_que);
					$SQL->bindParam(':amount_que', $amount_que);
					$SQL->bindParam(':id_type_que', $id_type_que);

					$SQL->execute();
				}

				Public function modif_quetes ($objet, $bdd)
				{
					$id_que = $objet->get_id_quetes();
					$n_que = $objet->get_nom_quetes();
					$desc_que = $objet->get_description_quetes();
					$dif_que = $objet->get_difficulte_quetes();
					$period_que = $objet->get_periode_quetes();
                    $amount_que = $objet->get_amount_quetes();
                    $etat_que = $objet->get_etat_quetes();
					
					if ($period_que == 'principale')
					{
						$id_type_que = 1;
					}
					if ($period_que == 'journaliere')
					{
						$id_type_que = 2;
					}
					if ($period_que == 'hebdomadaire')
					{
						$id_type_que = 3;
					}
					if ($period_que == 'mensuelle')
					{
						$id_type_que = 4;
					}


					$date = new DateTime(date('Y-m-d'));
					
					if ($period_que=='principale') {
						$date_fin_que='NULL';
					}
					if ($period_que=='journaliere') {
						$date->add(new DateInterval('P1D'));
						$date2 = $date->format('Y-m-d') . "\n";
						$date_fin_que=$date2;
					}
					if ($period_que=='hebdomadaire') {
						$date->add(new DateInterval('P7D'));
						$date2 = $date->format('Y-m-d') . "\n";
						$date_fin_que=$date2;
					}
					if ($period_que=='mensuelle') {
						$date->add(new DateInterval('P30D'));
						$date2 = $date->format('Y-m-d') . "\n";
						$date_fin_que=$date2;
					}
				
					$SQL = "UPDATE quetes SET id_quetes = '$id_que', nom_quetes  = '$n_que', description_quetes = '$desc_que', date_fin_quetes = '$date_fin_que', difficulte_quetes = '$dif_que', periode_quetes = '$period_que', amount_quetes = '$amount_que', etat_quetes = '$etat_que', id_type_quetes = '$id_type_que'
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
					$amount_que = $objet->get_amount_quetes();
					//$typequete= $objet->get_type_quetes();
					

					$SQL = " SELECT * From quetes WHERE id_quetes = '$id_que'";
					$Req = $bdd -> query ($SQL) or die (' Erreur affichage quetes ');
					return $Res = $Req -> fetch ();
				}

				public function tslesquetes($bdd)
				{
					$SQL="SELECT * FROM quetes ORDER BY etat_quetes, nom_quetes";
					$req = $bdd->query($SQL);
					return $req;
				}

				Public function suppr_quetes ($objet, $bdd)
				{
					$id_que = $objet->get_id_quetes();


					$SQL = "UPDATE quetes SET etat_quetes = '1'
					WHERE id_quetes = '$id_que'";
				 	$Req = $bdd -> query ($SQL) or die (' Erreur suppression quetes ');
				}


	/* ---------------------- */
	/* FIN class quetes */
	/* ---------------------- */
}
?>
