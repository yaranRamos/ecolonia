<?php 
class Colonia_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}

	public function verifica_colonia($municipio,$nombre){
		return $this->db->where('Municipio',$municipio)
						->where('Nombre',$nombre)
						->get('colonia')
						->row();
	}

	public function registra_colonia($municipio,$FechaFun,$NumeroHabitantes,$nombre,$ubicacion,$diagnostico,$extencion){
		return $this->db->set('Municipio',$municipio)
						->set('FechaFun',$FechaFun)
						->set('NumeroHabitantes',$NumeroHabitantes)
						->set('Nombre',$nombre)
						->set('Ubicacion',$ubicacion)
						->set('Diagnostico_inicial',$diagnostico)
						->set('Extension_Geografica',$extencion)
						->insert('colonia');
	}

	public function get_colonias($id_municipio){
		return $this->db->where('Municipio',$id_municipio)
						->from('colonia')
						->get()
						->result();
	}	
}