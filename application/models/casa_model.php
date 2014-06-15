<?php 
class Casa_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}

	public function registra_casa($calle,$colonia,$familia,$numero,$tel_casa){
		return $this->db->set('Calle',$calle)
						->set('Colonia',$colonia)
						->set('Familia',$familia)
						->set('Numero',$numero)
						->set('Tel_Casa',$tel_casa)
						->insert('casa');
	}

	public function obtener_id($calle,$colonia,$familia,$numero,$tel_casa){
		return $this->db->select('id')
						->where('Calle',$calle)
						->where('Colonia',$colonia)
						->where('Familia',$familia)
						->where('Numero',$numero)
						->where('Tel_Casa',$tel_casa)
						->from('casa')
						->get()
						->row();
	}

	public function get_casas($calle,$colonia){
		return $this->db->where('Calle',$calle)
						->where('Colonia',$colonia)
						->from('casa')
						->get()
						->result();
	}
}