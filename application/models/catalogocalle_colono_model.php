<?php 
class Catalogocalle_colono_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}

	public function registra_representante($calle_rep,$id_rep,$comite){
		return $this->db->set('catalogocalle_Id',$calle_rep)
						->set('colono_Id',$id_rep)
						->set('comitedebarrio_Id',$comite)
						->insert('catalogocalle_has_colono');
	}
}