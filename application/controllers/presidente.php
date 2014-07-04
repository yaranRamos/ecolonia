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
		$this->load->model('usuario_model');
		$this->load->model('colono_usuario_model');
		$this->load->model('catalogocalle_colono_model');
	}

	public function index(){
		if($this->session->userdata('tipo')==2){
			$this->load->view('presidente/header');
			$this->load->view('presidente/menu');
			$this->load->view('presidente/footer');
		} else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
		
	}

	public function estructura(){
		if($this->session->userdata('tipo')==2){
			$this->load->view('presidente/header');
			$this->load->view('presidente/estructura');
			$this->load->view('presidente/footer');
		} else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
	}

	public function formulario_registrar_colono(){
		if($this->session->userdata('tipo')==2){
			// Cargamos todos lo estados de la base de datos
			$estados = $this->estado_model->get_estados();
			$data = array(
				'estado' => $estados
			);
			$this->load->view('presidente/header_pres');
			$this->load->view('presidente/formulario_registrar_colono',$data);
			$this->load->view('presidente/footer_pres');
		} else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
	}

	public function formulario_registrar_miembros(){
		if($this->session->userdata('tipo')==2){
			$this->load->view('presidente/header_pres');
			$this->load->view('presidente/formulario_registrar_miembros');
			$this->load->view('presidente/footer_pres');
		} else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
	}

	public function calles(){
		if($this->session->userdata('tipo')==2){
			//consultamos calles/colonia/municipio/estado
			$calles = $this->calle_model->get_all();
			$data = array(
				'calle'=>$calles
			);
			$this->load->view('presidente/header');
			$this->load->view('presidente/calles',$data);
			$this->load->view('presidente/footer');
		} else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
	}

	public function registrar_calle(){
		if($this->session->userdata('tipo')==2){
			$this->load->view('presidente/header');
			$this->load->view('presidente/registrar_calle');
			$this->load->view('presidente/footer');
		} else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
	}

	public function miembros(){
		if($this->session->userdata('tipo')==2){
			$this->load->view('presidente/header');
			$this->load->view('presidente/miembros');
			$this->load->view('presidente/footer');
		} else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
	}

	public function registrar_miembro(){
		if($this->session->userdata('tipo')==2){
			$colonia = $this->session->userdata('colonia');
			$calles = $this->calle_model->get_calles($colonia);
			$data = array('calles'=>$calles);
			$this->load->view('presidente/header');
			$this->load->view('presidente/registrar_miembro',$data);
			$this->load->view('presidente/footer');
		} else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
	}

	public function representantes(){
		if($this->session->userdata('tipo')==2){
			$this->load->view('presidente/header');
			$this->load->view('presidente/representantes');
			$this->load->view('presidente/footer');
		} else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
	}

	public function registrar_representantes(){
		if($this->session->userdata('tipo')==2){
			$colonia = $this->session->userdata('colonia');
			$calles = $this->calle_model->get_calles($colonia);
			$data = array('calles' => $calles);
			$this->load->view('presidente/header');
			$this->load->view('presidente/registrar_representantes',$data);
			$this->load->view('presidente/footer');
		} else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
	}

	public function inserta_calles(){
		if($this->session->userdata('tipo')==2){
			if($this->input->post()){
				$calles = $this->input->post('calles');
				$colonia = $this->session->userdata('colonia');
				foreach($calles as $row){
					$calle = $row;
					$inserta_calle = $this->calle_model->registra_calle($calle,$colonia);
				}
				echo json_encode($inserta_calle);
			} else{
				echo json_encode(false);
			}
		} else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
	}

	public function logout(){
		if($this->session->userdata('tipo')==2){
			$this->session->sess_destroy();
			redirect('ecolonia');
		} else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
	}

	public function inserta_miembros(){
		if($this->session->userdata('tipo')==2){
			if($this->input->post()){
				$datos = $this->input->post('miembros');
				$colonia = $this->session->userdata('colonia');
				$comite = $this->session->userdata('comite');
				$tel_casa = "";
				$Estatura = "";
				$Peso = "";
				$cont = 0;
				$datos_usuarios = array();
				foreach ($datos as $row) {
					$nombre = $datos[$cont][0];
					$apellidoP = $datos[$cont][1];
					$apellidoM = $datos[$cont][2];
					$fecha = $datos[$cont][3];
					$sexo = $datos[$cont][4];
					$puesto = $datos[$cont][5];
					$email = $datos[$cont][6];
					$telefono = $datos[$cont][7];
					$calle = $datos[$cont][8];
					$numero = $datos[$cont][9];
					$registra_casa = $this->casa_model->registra_casa($calle,$colonia,$apellidoP,$numero,$tel_casa);
					if($registra_casa){
						$id_casa = $this->casa_model->obtener_id($calle,$colonia,$apellidoP,$numero,$tel_casa);
						$registra_colono = $this->colono_model->inserta_colono($id_casa->id,$apellidoP,$apellidoM,$fecha,$Estatura,$nombre,$Peso,$email,$sexo,$telefono);
						if($registra_colono){
							$id_miembro = $this->colono_model->get_id($apellidoP,$apellidoM,$nombre,$id_casa->id);
							$registra_miembro = $this->comitecolono_model->registra_miembro($comite,$id_miembro->Id,$puesto);
							if($registra_miembro){
								$usuario = $nombre.$apellidoP;
								$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
								$contrasena = "";
									for($i=0;$i<8;$i++) {
									$contrasena .= substr($str,rand(0,62),1);
								}
								$tipo = 3;
								$registra_usuario = $this->usuario_model->registra_usuario($usuario, $contrasena, $tipo);
								if($registra_usuario){
									$usuario_contrasena = array('usuario'=>$usuario, 'contrasena'=>$contrasena);
									$datos_usuarios [] = $usuario_contrasena;
									$id_usuario = $this->usuario_model->get_id($usuario, $contrasena, $tipo);
									$res_iu = $this->colono_usuario_model->inserta_usuario($id_miembro->Id, $id_usuario->Id);
								} else{
									echo json_encode($registra_usuario);
									return;
								}
							} else{
								echo json_encode($registra_miembro);
								return;
							}
						} else{
							echo json_encode($registra_colono);
							return;
						}
					} else{
						echo json_encode($id_casa);
						return;
					}
					$cont++;
				}
				$datos_enviar = array('resp' => true, 'datos' => $datos_usuarios);
				echo json_encode($datos_enviar);
			} else{
				redirect('presidente');
			}
		} else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
	}

	public function inserta_representantes(){
		if($this->session->userdata('tipo')==2){
			if($this->input->post()){
				$datos = $this->input->post('miembros');
				$colonia = $this->session->userdata('colonia');
				$comite = $this->session->userdata('comite');
				$tel_casa = "";
				$Estatura = "";
				$Peso = "";
				$cont = 0;
				$datos_usuarios = array();
				foreach ($datos as $row) {
					$nombre = $datos[$cont][0];
					$apellidoP = $datos[$cont][1];
					$apellidoM = $datos[$cont][2];
					$fecha = $datos[$cont][3];
					$sexo = $datos[$cont][4];
					$calle_rep = $datos[$cont][5];
					$email = $datos[$cont][6];
					$telefono = $datos[$cont][7];
					$calle = $datos[$cont][8];
					$numero = $datos[$cont][9];
					$registra_casa = $this->casa_model->registra_casa($calle,$colonia,$apellidoP,$numero,$tel_casa);
					if($registra_casa){
						$id_casa = $this->casa_model->obtener_id($calle,$colonia,$apellidoP,$numero,$tel_casa);
						$registra_colono = $this->colono_model->inserta_colono($id_casa->id,$apellidoP,$apellidoM,$fecha,$Estatura,$nombre,$Peso,$email,$sexo,$telefono);
						if($registra_colono){
							$id_rep = $this->colono_model->get_id($apellidoP,$apellidoM,$nombre,$id_casa->id);
							$registra_representante = $this->catalogocalle_colono_model->registra_representante($calle_rep,$id_rep->Id,$comite);
							if($registra_representante){
								$usuario = $nombre.$apellidoP;
								$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
								$contrasena = "";
								for($i=0;$i<8;$i++) {
									$contrasena .= substr($str,rand(0,62),1);
								}
								$tipo = 4;
								$registra_usuario = $this->usuario_model->registra_usuario($usuario, $contrasena, $tipo);
								if($registra_usuario){
									$usuario_contrasena = array('usuario'=>$usuario, 'contrasena'=>$contrasena);
									$datos_usuarios [] = $usuario_contrasena;
									$id_usuario = $this->usuario_model->get_id($usuario, $contrasena, $tipo);
									$res_iu = $this->colono_usuario_model->inserta_usuario($id_rep->Id, $id_usuario->Id);
								} else{
									echo json_encode($registra_usuario);
									return;
								}
							} else{
								echo json_encode($registra_representante);
								return;
							}
						} else{
							echo json_encode($registra_colono);
							return;
						}
					} else{
						echo json_encode($id_casa);
						return;
					}
					$cont++;
				}
				$datos_enviar = array('resp' => true, 'datos' => $datos_usuarios);
				echo json_encode($datos_enviar);
			} else{
				redirect('presidente');
			}
		} else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
	}
}