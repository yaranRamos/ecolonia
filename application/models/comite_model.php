<?php 
class Comite_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}

	public function registra_comite($colonia,$fundacion,$comite,$integrantes){
		return $this->db->set('Colonia',$colonia)
						->set('FechaFundacion',$fundacion)
						->set('Nombre',$comite)
						->set('Numero_Integrantes',$integrantes)
						->insert('comitedebarrio');
	}

	public function obtiene_id($comite,$integrantes){
		return $this->db->like('Nombre',$comite)
						->like('Numero_Integrantes',$integrantes)
						->get('comitedebarrio')
						->row();
	}
}