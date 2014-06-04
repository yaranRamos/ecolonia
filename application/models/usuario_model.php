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
}