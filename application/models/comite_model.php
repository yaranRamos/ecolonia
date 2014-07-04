<?php 
class Comite_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}

	public function registra_comite($colonia,$fundacion,$comite,$integrantes){
		return $this->db->set('Colonia',$colonia)
						->set('FechaFundacion',$fundacion)
						->set('Nombre',$comite)
						->set('Numero_Integrantes',$integrantes)
						->insert('comitedebarrio');
	}

	public function obtiene_id($comite,$integrantes){
		return $this->db->like('Nombre',$comite)
						->like('Numero_Integrantes',$integrantes)
						->get('comitedebarrio')
						->row();
	}

	public function get_comites($id_municipio){
		return $this->db->select('comitedebarrio.Nombre as nombre')
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
}