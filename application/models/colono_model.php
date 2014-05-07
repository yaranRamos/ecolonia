<?php 
class Colono_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}

	public function inserta_colono($Casa,$ApellidoPaterno,$ApellidoMaterno,$FechaNacimiento,$Estatura,$Nombre,$Peso,$Email,$Sexo,$Tel_celular){
		return $this->db->set('Casa',$Casa)
						->set('ApellidoPaterno',$ApellidoPaterno)
						->set('ApellidoMaterno',$ApellidoMaterno)
						->set('FechaNacimiento',$FechaNacimiento)
						->set('Estatura',$Estatura)
						->set('Nombre',$Nombre)
						->set('Peso',$Peso)
						->set('Email',$Email)
						->set('Sexo',$Sexo)
						->set('Tel_celular',$Tel_celular)
						->insert('colono');
	}

	public function obtiene_id($Email,$Tel_celular)
	{
		return $this->db->like('Email',$Email)
						->like('Tel_celular',$Tel_celular)
						->get('colono')
						->row();
	}
}