<?php
include 'class_utilisateur.php';
include '../includes/BDDConnection.php';

	/* ---------------------- */
	/* DEBUT class typequete */
	/* ---------------------- */

class typequete
{
		/* ---------------------- */
		/* class typequete Variables */
		/* ---------------------- */

		Private $id_type_quetes;
		Private $titre_type_quetes;



		/* ---------------------- */
		/* class typequete Constructeur */
		/* ---------------------- */

			Public function __construct ($id_type_que, $tit_typ_que)
			{

				$this->id_type_quetes = $id_type_que;
				$this->titre_type_quetes = $tit_typ_que;

			}

			/* ---------------------- */
			/* fonction typequete getalldata */
			/* ---------------------- */

			public function getalltypequete()
			{

				$data = $this->id_typequete;
				$data = $data.$this->titre_type_quetes;

				return $data;
			}

			/* ---------------------- */
			/* class typequete GET */
			/* ---------------------- */

			Public function get_id_type_quetes()
			{
				return $this->id_type_quetes;
			}

			Public function get_titre_type_quetes()
			{
				return $this->titre_type_quetes;
			}
			
			//Public function get_utilisateur ()
            //{
            //    return $this->id_utilisateur;
            //}

			/* ---------------------- */
			/* class typequete SET */
			/* ---------------------- */

			Public function set_id_type_quetes ($id_type_que)
			{
				 $this->id_type_quetes = $id_type_que;
			}

			Public function set_titre_quetes ($tit_typ_que)
			{
				 $this->titre_type_quetes = $tit_typ_que;
			}

	/* ---------------------- */
	/* FIN class typequete */
	/* ---------------------- */
}
?>
