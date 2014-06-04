<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrador extends CI_Controller {

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

	public function index()	{
		if($this->session->userdata('tipo')==1){
			$this->load->view('administrador/header_admon');
			$this->load->view('administrador/menu_admon');
			$this->load->view('administrador/footer_admon');
		} else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
	}

	public function menu_estructura(){
		if($this->session->userdata('tipo')==1){
			$this->load->view('administrador/header_admon');
			$this->load->view('administrador/menu_estructura');
			$this->load->view('administrador/footer_admon');
		} else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
	}

	public function formulario_registrar_comite(){
		if($this->session->userdata('tipo')==1){
			// Obtenemos estados y los mandamos a la vista
			$estados = $this->estado_model->get_estados();
			$data = array(
				'estado' => $estados
			);
			$this->load->view('administrador/header_admon');
			$this->load->view('administrador/formulario_registrar_comite',$data);
			$this->load->view('administrador/footer_admon');
		} else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
	}

	public function formulario_registrar_colonia(){
		if($this->session->userdata('tipo')==1){
			// Obtenemos estados y los mandamos a la vista
			$estados = $this->estado_model->get_estados();
			$data = array(
				'estado' => $estados
			);
			$this->load->view('administrador/header_admon');
			$this->load->view('administrador/formulario_registrar_colonia',$data); 
			$this->load->view('administrador/footer_admon');
		} else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
	}

	public function registrar_colonia(){
		if($this->session->userdata('tipo')==1){
			if($this->input->post()){
				$id_colonia = $this->input->post('nombre');
				$FechaFun = $this->input->post('fecha');
				$NumeroHabitantes = $this->input->post('NumeroHabitantes');
				$ubicacion = $this->input->post('ubicacion');
				$diagnostico = $this->input->post('diagnostico');
				$extencion = $this->input->post('extencion');
				$status = 1;

				// Validamos si la colonia existe
				$colonia = $this->colonia_model->registra_colonia($id_colonia,$FechaFun,$NumeroHabitantes,$ubicacion,$diagnostico,$extencion,$status);
				echo json_encode($colonia);
			} else{
				$resp = false;
				echo json_encode($resp);
			}
		} else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
	}

	public function registrar_comites(){
		if($this->session->userdata('tipo')==1){
			if ($this->input->post()) {
				$estado=$this->input->post('estado');
				$municipio=$this->input->post('municipio');
				$colonia=$this->input->post('colonia');
				//insertar datos del comite
				$comites=$this->comite_model->registra_comite($colonia,
													 $this->input->post('fundacion'),
													 $this->input->post('comite'),
													 $this->input->post('integrantes'));
				if($comites){
					$resultado = $this->comite_model->obtiene_id($this->input->post('comite'),$this->input->post('integrantes'));
					$id_comite = $resultado->Id;
					//insertar datos de la casa
					$familia=$this->input->post('apaterno');
					$calle=$this->input->post('calle');
					//insertar calle de la colonia
				    $this->calle_model->registra_calle($calle,$colonia);
				    $id_calle = $this->calle_model->obtiene_id($calle,$colonia);
				    $id_calleB = $id_calle->Id;
					$numero=$this->input->post('numero');
					$tel_casa = "";
					$this->casa_model->registra_casa($id_calleB,$colonia,$familia,$numero,$tel_casa);
					$casa = $this->casa_model->obtener_id($id_calleB,$colonia,$familia,$numero,$tel_casa);
					$Casa = $casa->id;
					
					//insertar datos del colono
					$ApellidoPaterno = $this->input->post('apaterno');
					$ApellidoMaterno = $this->input->post('amaterno');
					$FechaNacimiento = "";
					$Estatura = "";
					$Nombre = $this->input->post('nombre');
					$Peso = "";
					$Email = $this->input->post('correo');
					$Sexo = $this->input->post('sexo');
					$Tel_celular = $this->input->post('cel');
					$this->colono_model->inserta_colono($Casa,$ApellidoPaterno,$ApellidoMaterno,$FechaNacimiento,$Estatura,$Nombre,$Peso,$Email,$Sexo,$Tel_celular);
					$colono = $this->colono_model->obtiene_id($Email,$Tel_celular);
					$id_colono = $colono->Id;
					//insertar presidente de comite
					$Puesto=1;
					$presidente = $this->comitecolono_model->registrapresidente($id_comite,$id_colono,$Puesto);
					//insertat presidente en usuario
					$usuario = $Nombre.$ApellidoPaterno;
					$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
					$contrasena = "";
						for($i=0;$i<8;$i++) {
						$contrasena .= substr($str,rand(0,62),1);
					}
					$tipo = 2;
					$res_ru = $this->usuario_model->registra_usuario($usuario, $contrasena, $tipo);
					if($res_ru){
						$id_usuario = $this->usuario_model->get_id($usuario, $contrasena, $tipo);
						$res_iu = $this->colono_usuario_model->inserta_usuario($id_colono, $id_usuario->Id);
						if($res_iu){
							$res = true;
							$datos = array('resp'=>$res, 'usuario'=>$usuario, 'contrasena'=>$contrasena);
							echo json_encode($datos);
						} else{
							$res = false;
							$datos = array($res);
							echo json_encode($datos);
							return;
						}
					} else{
						$res = false;
						$datos = array($res);
						echo json_encode($datos);
						return;
					}
				} else{
					echo json_encode($presidente);
				}
			} else{
				$resp = false;
				echo json_encode($resp);
			}
		} else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
	}
	
	public function get_municipios(){
		if($this->session->userdata('tipo')==1){
			if($this->input->post()){
				$id_estado = $this->input->post('estado_id');
				$municipios = $this->municipio_model->get_municipios($id_estado);
				echo json_encode($municipios);
			}
		} else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
	}

	public function get_colonias(){
		if($this->session->userdata('tipo')==1){
			if($this->input->post()){
				$id_municipio = $this->input->post('municipio_id');
				$status = 1;
				$colonias = $this->colonia_model->get_colonias($id_municipio,$status);
				echo json_encode($colonias);
			}
		} else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
	}

	public function get_colonias1(){
		if($this->session->userdata('tipo')==1){
			if($this->input->post()){
				$id_municipio = $this->input->post('municipio_id');
				$colonias = $this->colonia_model->get_colonias1($id_municipio);
				echo json_encode($colonias);
			}
		} else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
	}

	public function logout(){
		if($this->session->userdata('tipo')==1){
			$this->session->sess_destroy();
			redirect('ecolonia');
		} else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
	}
}