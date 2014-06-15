<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ecolonia extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('usuario_model');
		$this->load->model('especial_model');
	}

	public function index(){
		$this->load->view('home/header');
		$this->load->view('home/inicio');
		$this->load->view('home/footer');
	}

	public function iniciar_sesion(){
		$data = array('mensaje' => "");
		$this->load->view('home/header');
		$this->load->view('home/iniciar_sesion',$data);
		$this->load->view('home/footer'); 
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
					$id_comite = $this->especial_model->usuario_cu_comitebarrio($usuario, $contrasena, $tipo);
					$this->session->set_userdata('comite',$id_comite->Idcomite);
					redirect('presidente');
				} elseif($tipo == 3){
					redirect('ecolonia');
				} elseif($tipo == 4){
					$id_calle = $this->especial_model->get_id_calle($usuario, $contrasena, $tipo);
					$this->session->set_userdata('calle',$id_calle->Id_calle);
					redirect('representante_calle');
				} elseif($tipo == 5){
					$id_casa = $this->especial_model->get_id_casa($usuario, $contrasena, $tipo);
					$this->session->set_userdata('casa',$id_casa->Id_casa);
					redirect('colono');
				} else{
					redirect('ecolonia/iniciar_sesion');
				}
			} else{
				$data = array('mensaje' => "Usuario no valido");
				$this->load->view('home/header');
				$this->load->view('home/iniciar_sesion',$data);
				$this->load->view('home/footer'); 
			}	
		}else{
			redirect('ecolonia/iniciar_sesion');
		}
	}
}