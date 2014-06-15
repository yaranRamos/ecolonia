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
		$this->load->model('usuario_model');
		$this->load->model('colono_usuario_model');
	}

	public function index(){
		if($this->session->userdata('tipo')==4){
			$this->load->view('representante_calle/header');
			$this->load->view('representante_calle/menu');
			$this->load->view('representante_calle/footer');
		} else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
	}

	public function estructura(){
		if($this->session->userdata('tipo')==4){
			$this->load->view('representante_calle/header');
			$this->load->view('representante_calle/estructura');
			$this->load->view('representante_calle/footer');
		} else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
	}

	public function casas(){
		if($this->session->userdata('tipo')==4){
			$calle = $this->session->userdata('calle');
			$colonia = $this->session->userdata('colonia');
			$casas = $this->casa_model->get_casas($calle,$colonia);
			$data = array('casas' => $casas);
			$this->load->view('representante_calle/header');
			$this->load->view('representante_calle/casas',$data);
			$this->load->view('representante_calle/footer');
		} else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
	}

	public function registrar_casa(){
		if($this->session->userdata('tipo')==4){
			$estados = $this->estado_model->get_estados();
			$data = array(
				'estado' => $estados
			);
			$this->load->view('representante_calle/header');
			$this->load->view('representante_calle/registrar_casa',$data);
			$this->load->view('representante_calle/footer');
		} else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
	}

	public function inserta_casa(){
		if($this->session->userdata('tipo')==4){
			if($this->input->post()){
				$calle = $this->session->userdata('calle');
				$colonia = $this->session->userdata('colonia');

				$familia = $this->input->post('familia');
				$telefono = $this->input->post('telefono');
				$numero = $this->input->post('numero');
				$nombre = $this->input->post('nombre');
				$apellidoP = $this->input->post('apellidoP');
				$apellidoM = $this->input->post('apellidoM');
				$fecha = $this->input->post('fecha');
				$sexo = $this->input->post('sexo');
				$email = $this->input->post('email');
				$cel = $this->input->post('cel');

				$registra_casa = $this->casa_model->registra_casa($calle,$colonia,$familia,$numero,$telefono);
				if($registra_casa){
					$id_casa = $this->casa_model->obtener_id($calle,$colonia,$familia,$numero,$telefono);
					$registra_colono = $this->colono_model->inserta_colono($id_casa->id,$apellidoP,$apellidoM,$fecha,0,$nombre,0,$email,$sexo,$cel);
					if($registra_colono){
						$id_colono = $this->colono_model->get_id($apellidoP,$apellidoM,$nombre,$id_casa->id);
						$usuario = $nombre.$apellidoP;
						$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
						$contrasena = "";
							for($i=0;$i<8;$i++) {
							$contrasena .= substr($str,rand(0,62),1);
						}
						$registra_usuario = $this->usuario_model->registra_usuario_colono($usuario, $contrasena, 5);
						if($registra_usuario){
							$usuario_contrasena = array('resp'=>true, 'usuario'=>$usuario, 'contrasena'=>$contrasena);
							$id_usuario = $this->usuario_model->get_id($usuario, $contrasena, 5);
							$res_iu = $this->colono_usuario_model->inserta_usuario($id_colono->Id, $id_usuario->Id);
							echo json_encode($usuario_contrasena);
						} else{
							echo json_encode($registra_usuario);
						}
					} else{
						echo json_encode($registra_colono);
					}
				} else{
					echo json_encode($registra_casa);
				}
			} else{
				echo json_encode(flase);
			}
		} else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
	}

	public function logout(){
		if($this->session->userdata('tipo')==4){
			$this->session->sess_destroy();
			redirect('ecolonia');
		} else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
	}
}