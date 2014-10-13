<?php
class Rol_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function getall(){
		return $this->db->get('rol')
						->result();
	}

}