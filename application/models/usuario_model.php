<?php 
class Usuario_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}

	public function login($usuario, $contrasena, $tipo){
		return $this->db->where('Nombre',$usuario)
						->where('Password',$contrasena)
						->where('rol_Id',$tipo)
						->get('usuario')
						->row();
	}

	public function registra_usuario($usuario, $contrasena, $tipo){
		return $this->db->set('Nombre',$usuario)
						->set('Password',$contrasena)
						->set('rol_Id',$tipo)
						->insert('usuario');
	}

	public function get_id($usuario, $contrasena, $tipo){
		return $this->db->select('Id')
						->where('Nombre',$usuario)
						->where('Password',$contrasena)
						->where('rol_Id',$tipo)
						->get('usuario')
						->row();
	}
}