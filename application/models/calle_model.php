<?php 
class Calle_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}

	public function registra_calle($calle,$colonia){
		$this->db->set('Nombre',$calle)
				 ->set('Colonia',$colonia)
				 ->insert('catalogocalle');

		return $this->db->insert_id();
	}

	public function get_calles($colonia){
		return $this->db->where('Colonia',$colonia)
						->get('catalogocalle')
						->result();
	}

	public function get_all(){
		return $this->db->select('catalogocalle.Nombre as nombre_calle')
						->select('colonia.Nombre as nombre_colonia')
						->select('municipio.Nombre as nombre_municipio')
						->select('estado.Nombre as nombre_estado')
						->from('catalogocalle')
						->join('colonia','catalogocalle.Colonia = colonia.Id')
						->join('municipio','colonia.Municipio = municipio.Id')
						->join('estado','municipio.Estado = estado.Id')
						->get()
						->result();
	}
}