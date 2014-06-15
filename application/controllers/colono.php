<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Colono extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('colono_model');
		$this->load->model('usuario_model');
		$this->load->model('colono_usuario_model');
	}

	public function index(){
		if($this->session->userdata('tipo')==5){
			$this->load->view('colono/header');
			$this->load->view('colono/menu');
			$this->load->view('colono/footer');
		} else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
	}

	public function estructura(){
		if($this->session->userdata('tipo')==5){
			$this->load->view('colono/header');
			$this->load->view('colono/estructura');
			$this->load->view('colono/footer');
		} else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
	}

	public function miembros(){
		if($this->session->userdata('tipo')==5){
			$casa = $this->session->userdata('casa');
			$integrantes = $this->colono_model->get_miembros($casa);
			$data = array('integrantes'=>$integrantes);
			$this->load->view('colono/header');
			$this->load->view('colono/miembros',$data);
			$this->load->view('colono/footer');
		} else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
	}

	public function registrar_miembros(){
		if($this->session->userdata('tipo')==5){
			$this->load->view('colono/header');
			$this->load->view('colono/registrar_miembros');
			$this->load->view('colono/footer');
		} else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
	}

	public function inserta_miembros(){
		if($this->session->userdata('tipo')==5){
			if($this->input->post()){
				$datos = $this->input->post('miembros');
				$casa = $this->session->userdata('casa');
				$cont = 0;
				foreach($datos as $row) {
					$nombre = $datos[$cont][0];
					$apellidoP = $datos[$cont][1];
					$apellidoM = $datos[$cont][2];
					$fecha = $datos[$cont][3];
					$sexo = $datos[$cont][4];
					$rol = $datos[$cont][5];
					$email = $datos[$cont][6];
					$cel = $datos[$cont][7];

					$registra_colono = $this->colono_model->inserta_colono($casa,$apellidoP,$apellidoM,$fecha,0,$nombre,0,$email,$sexo,$cel);
					if($registra_colono){
						$id_colono = $this->colono_model->get_id($apellidoP,$apellidoM,$nombre,$casa);
						$usuario = $nombre.$apellidoP;
						$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
						$contrasena = "";
							for($i=0;$i<8;$i++) {
							$contrasena .= substr($str,rand(0,62),1);
						}
						$registra_usuario = $this->usuario_model->registra_usuario_colono($usuario, $contrasena, 5);
						if($registra_usuario){
							$usuario_contrasena = array('usuario'=>$usuario, 'contrasena'=>$contrasena);
							$datos_usuarios [] = $usuario_contrasena;
							$id_usuario = $this->usuario_model->get_id($usuario, $contrasena, 5);
							$res_iu = $this->colono_usuario_model->inserta_usuario($id_colono->Id, $id_usuario->Id);
						} else{
							echo json_encode($registra_usuario);
							return;
						}
					} else{
						echo json_encode($registra_colono);
						return;
					}
					$cont++;
				}
				$datos_enviar = array('resp' => true, 'datos' => $datos_usuarios);
				echo json_encode($datos_enviar);
			} else{
				echo json_encode(false);
			}
		} else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
	}

	public function logout(){
		if($this->session->userdata('tipo')==5){
			$this->session->sess_destroy();
			redirect('ecolonia');
		} else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
	}
}