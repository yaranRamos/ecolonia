<?php 
class Estado_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}

	public function get_estados(){
		return $this->db->get('estado');
	}
}