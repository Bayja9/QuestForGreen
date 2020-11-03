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

			Public function __construct ($id_bad, $n_bad, $desc_bad, $n_img_bad)
			{

				$this->id_badge = $id_bad;
				$this->nom_badge = $n_bad;
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


			/* ---------------------- */
			/* class Box fonctions publiques */
			/* ---------------------- */


			Public function ajout_badge ($objet, $conn)
				{
					$id_badge = $objet->get_id_badge();
					$nom_badge = $objet->get_nom_badge();
					$description_badge = $objet->get_description_badge();
					$nom_image_badge = $objet->get_nom_image_badge();


					print $SQL = " INSERT INTO badge values (NULL, '$n_badge', '$desc_badge', '$nom_image_badge')";
					$Req = $conn -> query ($SQL) or die (' Erreur ajout badge ');
				}

				Public function modif_badge ($objet, $conn)
				{
					$id_badge = $objet->get_id_badge();
					$nom_badge = $objet->get_nom_badge();
					$description_badge = $objet->get_description_badge();
					$nom_image_badge = $objet->get_nom_image_badge();

				
					print $SQL = "UPDATE badge SET id_badge = '$id_bad', nom_badge  = '$n_badge', description_badge = '$desc_badge'
          			nom_image_badge  = '$n_img_bad'
					WHERE id_badge = '$id_util'";
				 	$Req = $conn -> query ($SQL) or die (' Erreur modification badge ');
				}

				Public function affiche_badge_total($objet, $conn)
				{
					$id_badge = $objet->get_id_badge();
					$nom_badge = $objet->get_nom_badge();
					$description_badge = $objet->get_description_badge();
					$nom_image_badge = $objet->get_nom_image_badge();
					

					print $SQL = " SELECT * From badge WHERE id_badge = '$id_bad'";
					$Req = $conn -> query ($SQL) or die (' Erreur affichage badge ');
					return $Res = $Req -> fetch ();
				}

				Public function suppr_badge ($objet, $conn)
				{
					$id_badge = $objet->get_id_badge();


					print $SQL = "UPDATE badge SET etat_badge = '1'
					WHERE id_badge = '$id_bad'";
				 	$Req = $conn -> query ($SQL) or die (' Erreur suppression badge ');
				}


	/* ---------------------- */
	/* FIN class badge */
	/* ---------------------- */
}
?>
