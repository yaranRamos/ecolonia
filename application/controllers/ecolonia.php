<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ecolonia extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('usuario_model');
		$this->load->model('especial_model');
	}

	public function index(){
		$this->load->view('home/header_home');
		$this->load->view('home/inicio_home');
		$this->load->view('home/footer_home');
	}

	public function casos_exito(){
		$this->load->view('home/header_home');
		$this->load->view('home/casos_home');
		$this->load->view('home/footer_home');
	}

	public function intervencion(){
		$this->load->view('home/header_home');
		$this->load->view('home/intervencion_home');
		$this->load->view('home/footer_home');
	}

	public function iniciar_sesion(){
		$data = array('mensaje' => "");
		$this->load->view('home/header_home');
		$this->load->view('home/iniciar_sesion',$data);
		$this->load->view('home/footer_home'); 
	}
	
	public function logueo(){
		if($this->input->post()){
			$usuario = $this->input->post('usuario');
			$contrasena = $this->input->post('password');
			$tipo = $this->input->post('tipo_usuario');
			$res = $this->usuario_model->login($usuario, $contrasena, $tipo);
			if($res){
				$datos = $this->especial_model->usuario_colono_casa($usuario, $contrasena, $tipo);
				$this->session->set_userdata('nombre',$usuario);
				$this->session->set_userdata('tipo',$tipo);
				$this->session->set_userdata('colonia',$datos->colonia);
				if($tipo == 1){
					redirect('administrador');
				} elseif($tipo == 2){
					redirect('presidente');
				} elseif($tipo == 4){
					redirect('representante_calle');
				} else{
					redirect('ecolonia/iniciar_sesion');
				}
			} else{
				$data = array('mensaje' => "Usuario no valido");
				$this->load->view('home/header_home');
				$this->load->view('home/iniciar_sesion',$data);
				$this->load->view('home/footer_home'); 
			}	
		}else{
			redirect('ecolonia/iniciar_sesion');
		}
	}
}