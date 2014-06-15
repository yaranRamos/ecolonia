<?php 
class Calle_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}

	public function registra_calle($calle,$colonia){
		return $this->db->set('Nombre',$calle)
						->set('Colonia',$colonia)
						->insert('catalogocalle');
	}

	public function obtiene_id($calle,$colonia){
		return $this->db->select('Id')
						->where('Nombre',$calle)
						->where('Colonia',$colonia)
						->get('catalogocalle')
						->row();
	}

	public function get_calles($colonia){
		return $this->db->where('Colonia',$colonia)
						->get('catalogocalle')
						->result();
	}
}