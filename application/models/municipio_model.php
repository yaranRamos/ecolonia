<?php 
class Municipio_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}

	public function get_municipios($id_estado){
		return $this->db->where('Estado',$id_estado)
						->from('municipio')
						->get()
						->result();
	}
}