<?php
include 'class_quetes.php';
include 'class_type_quetes.php';
include '../includes/BDDConnection.php';

	/* ---------------------- */
	/* DEBUT class validation_quetes */
	/* ---------------------- */

class validation_quetes
{
		/* ---------------------- */
		/* class validation_quetes Variables */
		/* ---------------------- */

		Private $id_validation_quetes;
		Private $description_validation_quetes;
		Private $nom_image_validation_quetes;
        Private $unutilisateur;
        Private $unequete;


		/* ---------------------- */
		/* class validation_quetes Constructeur */
		/* ---------------------- */

			Public function __construct ($id_bad, $n_bad, $desc_bad, $n_img_bad, $id_util, $etat_bad, $user_util, $pass_util, $xp_util, $pts_util, $mail_util, $niv_util, $n_img, $etat_util, $bdd)
			{

				$this->id_validation_quetes = $id_valid_que;
				$this->description_validation_quetes = $desc_valid_que;
				$this->nom_image_validation_quetes = $n_img_valid_que;
				$this->etat_validation_quetes = $etat_valid_que;
				$utilisateur=new utilisateur($id_util, $pass_util, $user_util, $xp_util, $pts_util, $mail_util, $niv_util, $n_img, $etat_util, $id_typ_que, $titre_typ_que, $bdd);
                $unutilisateur=$utilisateur;
                $typequete=new typequetes($id_typ_que, $titre_typ_que, $bdd);
                $untypequete=$typequete;
			}

			/* ---------------------- */
			/* fonction validation_quetes getalldata */
			/* ---------------------- */

			public function getallvalidation_quetes()
			{
				$data = $this->id_validation_quetes;
				$data = $data.$this->nom_validation_quetes;
				$data = $data.$this->description_validation_quetes;
                $data = $data.$this->nom_image_validation_quetes;


				return $data;
			}

			/* ---------------------- */
			/* class validation_quetes GET */
			/* ---------------------- */

			Public function get_id_validation_quetes()
			{
				return $this->id_validation_quetes;
			}

			Public function get_description_validation_quetes()
			{
				return $this->description_validation_quetes;
			}

            Public function get_nom_image_validation_quetes ()
            {
                return $this->nom_image_validation_quetes;
			}

			Public function get_etat_validation_quetes ()
            {
                return $this->etat_validation_quetes;
			}
			
			Public function get_utilisateur ()
            {
                return $this->id_utilisateur;
            }

            Public function get_type_quetes ()
            {
                return $this->id_type_quetes;
            }

			/* ---------------------- */
			/* class validation_quetes SET */
			/* ---------------------- */

			Public function set_id_validation_quetes ($id_valid_que)
			{
				 $this->id_validation_quetes = $id_valid_que;
			}

			Public function set_description_validation_quetes ($desc_valid_que)
			{
				 $this->description_validation_quetes = $desc_valid_que;
			}

			Public function set_nom_image_validation_quetes ($n_img_valid_que)
			{
				 $this->nom_image_validation_quetes = $n_img_bad;
			}

			Public function set_etat_validation_quetes ($etat_valid_que)
			{
				 $this->etat_validation_quetes = $etat_valid_que;
			}

			Public function set_utilisateur ($utilisateur)
			{
				 $this->id_utilisateur = $utilisateur;
            }
            
            Public function set_types_quetes ($typequete)
			{
				 $this->id_type_quetes = $typequete;
			}


			/* ---------------------- */
			/* class Box fonctions publiques */
			/* ---------------------- */


			Public function ajout_validation_quetes ($objet, $bdd)
				{
					$id_validation_quetes = $objet->get_id_validation_quetes();
					$nom_validation_quetes = $objet->get_nom_validation_quetes();
					$description_validation_quetes = $objet->get_description_validation_quetes();
					$nom_image_validation_quetes = $objet->get_nom_image_validation_quetes();
					$etat_bad = $objet->get_etat_validation_quetes();
					//$utilisateur = $objet->get_utilisateur();


					print $SQL = "INSERT INTO validation_quetes (nom_validation_quetes, description_validation_quetes, nom_image_validation_quetes, id_utilisateur) values ('$nom_validation_quetes','$description_validation_quetes','$nom_image_validation_quetes','0')";
					$Req = $bdd -> query ($SQL) or die (' Erreur ajout validation_quetes ');
				}

				Public function modif_validation_quetes ($objet, $bdd)
				{
					$id_validation_quetes = $objet->get_id_validation_quetes();
					$nom_validation_quetes = $objet->get_nom_validation_quetes();
					$description_validation_quetes = $objet->get_description_validation_quetes();
					$nom_image_validation_quetes = $objet->get_nom_image_validation_quetes();
					$etat_validation_quetes = $objet->get_etat_validation_quetes();
					//$utilisateur = $objet->get_utilisateur();
				

					$SQL = "UPDATE validation_quetes SET id_validation_quetes = '$id_validation_quetes', nom_validation_quetes  = '$nom_validation_quetes', description_validation_quetes = '$description_validation_quetes',
          			nom_image_validation_quetes  = '$nom_image_validation_quetes'
					WHERE id_validation_quetes = '$id_validation_quetes'";
				 	$Req = $bdd -> query ($SQL) or die (' Erreur modification validation_quetes ');
				}

				Public function affiche_validation_quetes_total($objet, $bdd)
				{
					$id_validation_quetes = $objet->get_id_validation_quetes();
					$nom_validation_quetes = $objet->get_nom_validation_quetes();
					$description_validation_quetes = $objet->get_description_validation_quetes();
					$nom_image_validation_quetes = $objet->get_nom_image_validation_quetes();
					$etat_bad = $objet->get_etat_validation_quetes();
					//$utilisateur = $objet->get_utilisateur();
					

					$SQL = " SELECT * From validation_quetes WHERE id_validation_quetes = '$id_validation_quetes'";
					$Req = $bdd -> query ($SQL) or die (' Erreur affichage validation_quetes ');
					return $Res = $Req -> fetch ();
				}

				public function tslesvalidation_quetess($bdd)
				{
					$SQL="SELECT * FROM validation_quetes ORDER BY etat_validation_quetes";
					$req = $bdd->query($SQL);
					return $req;
				}

				Public function suppr_validation_quetes ($objet, $bdd)
				{
					$id_validation_quetes = $objet->get_id_validation_quetes();
					//$utilisateur = $objet->get_utilisateur();


					print $SQL = "UPDATE validation_quetes SET etat_validation_quetes = '1'
					WHERE id_validation_quetes = '$id_validation_quetes'";
				 	$Req = $bdd -> query ($SQL) or die (' Erreur suppression validation_quetes ');
				}


	/* ---------------------- */
	/* FIN class validation_quetes */
	/* ---------------------- */
}
?>
