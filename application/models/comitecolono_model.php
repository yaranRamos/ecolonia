<?php 
class Comitecolono_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}

	public function registrapresidente($id_comite,$id_colono,$Puesto){
		return $this->db->set('comitedebarrio_Id',$id_comite)
						->set('colono_Id',$id_colono)
						->set('Puesto',$Puesto)
						->insert('comitedebarrio_has_colono');
	}

	
}