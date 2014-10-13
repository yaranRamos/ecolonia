<?php 
class Comite_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}

	public function registra_comite($colonia,$fundacion,$comite,$integrantes){
		$this->db->set('Colonia',$colonia)
		     	 ->set('FechaFundacion',$fundacion)
				 ->set('Nombre',$comite)
				 ->set('Numero_Integrantes',$integrantes)
				 ->insert('comitedebarrio');

		return $this->db->insert_id();
	}

	public function get_comites($id_municipio){
		return $this->db->select('comitedebarrio.Id as Id')
						->select('comitedebarrio.Nombre as nombre')
						->select('comitedebarrio.FechaFundacion as fechaFundacion')
						->select('comitedebarrio.Numero_Integrantes as numeroIntegrantes')
						->select('comitedebarrio.FechaTerminacion as fechaTerminacion')
						->from('comitedebarrio')
						->join('colonia','comitedebarrio.Colonia = colonia.Id')
						->join('municipio','colonia.Municipio = municipio.Id')
						->where('municipio.Id',$id_municipio)
						->get()
						->result();
	}

	public function valida_comite($colonia,$nombre){
		return $this->db->select('*')
						->where('Colonia',$colonia)
						->where('Nombre',$nombre)
						->from('comitedebarrio')
						->get()
						->row();
	}

}