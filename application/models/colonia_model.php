<?php 
class Colonia_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}

	public function registra_colonia($municipio,$nombre,$ubicacion,$diagnostico,$extencion){
		return $this->db->set('Municipio',$municipio)
						->set('Nombre',$nombre)
						->set('Ubicacion',$ubicacion)
						->set('Diagnostico_inicial',$diagnostico)
						->set('Extension_Geografica',$extencion)
						->insert('colonia');
	}	
}