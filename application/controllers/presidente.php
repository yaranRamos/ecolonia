<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Presidente extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('casa_model');
		$this->load->model('colono_model');
		$this->load->model('colonia_model');
		$this->load->model('comite_model');
		$this->load->model('calle_model');
		$this->load->model('comitecolono_model');
		$this->load->model('estado_model');
		$this->load->model('municipio_model');
	}

	public function index(){
		$this->load->view('presidente/header_pres');
		$this->load->view('presidente/menu_pres');
		$this->load->view('presidente/footer_pres');
	}

	public function menu_estructura(){
		$this->load->view('presidente/header_pres');
		$this->load->view('presidente/menu_estruc_pres');
		$this->load->view('presidente/footer_pres');
	}

	public function formulario_registrar_colono(){
		// Cargamos todos lo estados de la base de datos
		$estados = $this->estado_model->get_estados();
		$data = array(
			'estado' => $estados
		);
		$this->load->view('presidente/header_pres');
		$this->load->view('presidente/formulario_registrar_colono',$data);
		$this->load->view('presidente/footer_pres');
	}

	public function formulario_registrar_miembros(){
		$this->load->view('presidente/header_pres');
		$this->load->view('presidente/');
		$this->load->view('presidente/footer_pres');
	}

	public function formulario_registrar_calle(){
		$this->load->view('presidente/header_pres');
		$this->load->view('presidente/formulario_registrar_calle');
		$this->load->view('presidente/footer_pres');
	}

	public function registrar_calles(){
		if($this->input->post()){
			$resp = true;
			echo json_encode($resp);
		} else{
			$resp = false;
			echo json_encode($resp);
		}
	}	
}