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

	public function valida_colonia($id_colonia){
		return $this->db->select('status')
						->where('Id',$id_colonia)
						->from('colonia')
						->get()
						->row();
	}

	public function registra_colonia($id_colonia,$FechaFun,$NumeroHabitantes,$ubicacion,$diagnostico,$extencion,$status){
		return $this->db->set('FechaFun',$FechaFun)
						->set('NumeroHabitantes',$NumeroHabitantes)
						->set('Ubicacion',$ubicacion)
						->set('Diagnostico_inicial',$diagnostico)
						->set('Extension_Geografica',$extencion)
						->set('status',$status)
						->where('Id',$id_colonia)
						->update('colonia');
	}

	public function get_colonias($id_municipio,$status){
		return $this->db->where('Municipio',$id_municipio)
						->where('status',$status)
						->from('colonia')
						->get()
						->result();
	}	

	public function get_colonias1($id_municipio){
		return $this->db->where('Municipio',$id_municipio)
						->from('colonia')
						->get()
						->result();
	}	
}