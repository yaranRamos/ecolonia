<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Representante_Calle extends CI_Controller {

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
		$this->load->view('representante_calle/header_rep');
		$this->load->view('representante_calle/menu_rep');
		$this->load->view('representante_calle/footer_rep');
	}

	public function menu_estruc_rep(){
		$this->load->view('representante_calle/header_rep');
		$this->load->view('representante_calle/menu_estruc_rep');
		$this->load->view('representante_calle/footer_rep');
	}

	public function formulario_registrar_casa(){
		$estados = $this->estado_model->get_estados();
		$data = array(
			'estado' => $estados
		);
		$this->load->view('representante_calle/header_rep');
		$this->load->view('representante_calle/formulario_registrar_casa',$data);
		$this->load->view('representante_calle/footer_rep');
	}
}