<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrador extends CI_Controller {

	private $estados;

	public function __construct(){
		parent::__construct();
		$this->load->model('casa_model');
		$this->load->model('colono_model');
		$this->load->model('colonia_model');
		$this->load->model('comite_model');
		$this->load->model('calle_model');
		$this->load->model('comitecolono_model');
		$this->load->model('estado_model');
		$this->load->model('especial_model');
		$this->load->model('municipio_model');
		$this->load->model('usuario_model');
		$this->load->model('colono_usuario_model');
		$this->estados = $estados = $this->estado_model->get_estados();
	}

	public function index()	{
		if($this->session->userdata('tipo')==1){
			$data['contenido'] = "administrador/menu";
			$this->load->view('administrador/template',$data);
		} else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
	}

	public function estructura(){
		if($this->session->userdata('tipo')==1){
			$data['contenido'] = "administrador/estructura";
			$this->load->view('administrador/template',$data);
		} else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
	}

	public function comites(){
		if($this->session->userdata('tipo')==1){
			$data['contenido'] = "administrador/comites";
			$data['estado'] = $this->estados;
			$this->load->view('administrador/template',$data);
		} else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
	}

	public function registrar_comite(){
		if($this->session->userdata('tipo')==1){
			$data['contenido'] = "administrador/registrar_comite";
			$data['estado'] = $this->estados;
			$this->load->view('administrador/template',$data);
		} else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
	}

	public function valida_comite(){
		if($this->session->userdata('tipo') ==1){
			if($this->input->post()){
				$colonia = $this->input->post('colonia');
				$nombre = $this->input->post('nombre');
				$valida = $this->comite_model->valida_comite($colonia,$nombre);
				if(is_object($valida)){
					echo json_encode(true);
				}else{
					echo json_encode(false);
				}
			}
		}else{
			$this->session->sess_destroy();
			echo json_encode(false);
		}
	}

	public function colonias(){
		if($this->session->userdata('tipo')==1){
			$data['contenido'] = "administrador/colonias";
			$data['estado'] = $this->estados;
			$this->load->view('administrador/template',$data);
		} else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
	}

	public function registrar_colonia(){
		if($this->session->userdata('tipo')==1){
			$data['contenido'] = "administrador/registrar_colonia";
			$data['estado'] = $this->estados;
			$this->load->view('administrador/template',$data);
		} else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
	}

	public function inserta_colonia(){
		if($this->session->userdata('tipo')==1){
			if($this->input->post()){
				$id_colonia = $this->input->post('nombre');
				$FechaFun = $this->input->post('fecha');
				$NumeroHabitantes = $this->input->post('NumeroHabitantes');
				$ubicacion = $this->input->post('ubicacion');
				$diagnostico = $this->input->post('diagnostico');
				$extencion = $this->input->post('extencion');
				$status = 1;
				$colonia = $this->colonia_model->registra_colonia($id_colonia,$FechaFun,$NumeroHabitantes,$ubicacion,$diagnostico,$extencion,$status);
				echo json_encode($colonia);
			} else{
				echo json_encode(false);
			}
		} else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
	}

	public function valida_colonia(){
		if($this->session->userdata('tipo')==1){
			if($this->input->post()){
				$id_colonia = $this->input->post('id');
				$status = 0;
				$valida = $this->colonia_model->valida_colonia($id_colonia);
				if($valida->status == 0){
					echo json_encode(true);
				}else{
					echo json_encode(false);
				}
			}
		}else{
			$this->session->sess_destroy();
			echo json_encode(false);
		}
	}

	public function detalle_colonia(){
		if($this->session->userdata('tipo')==1){
			if($this->input->post()){
				$colonia = $this->input->post('colonia');
				$data['detalle_colonia'] = $this->especial_model->detalle_colonia($colonia);
				$data['contenido'] = 'administrador/detalle_colonia';
				$this->load->view('administrador/template',$data);
			}else{
				$this->session->sess_destroy();	
			}		
		}else{
			$this->session->sess_destroy();
		}
	}

	public function inserta_comite(){
		if($this->session->userdata('tipo')==1){
			if ($this->input->post()) {
				$estado = $this->input->post('estado');
				$municipio = $this->input->post('municipio');
				$colonia = $this->input->post('colonia');
				//insertar datos del comite
				$id_comite = $this->comite_model->registra_comite($colonia,
													 $this->input->post('fundacion'),
													 $this->input->post('comite'),
													 $this->input->post('integrantes'));
				if($id_comite){
					//insertar datos de la casa
					$familia = $this->input->post('apaterno');
					$calle = $this->input->post('calle');
				
					//insertar calle de la colonia
				    $id_calle = $this->calle_model->registra_calle($calle,$colonia);
					$numero = $this->input->post('numero');
					$tel_casa = "";
					$Casa = $this->casa_model->registra_casa($id_calle,$colonia,$familia,$numero,$tel_casa);

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
					$id_colono = $this->colono_model->inserta_colono($Casa,$ApellidoPaterno,$ApellidoMaterno,$FechaNacimiento,$Estatura,$Nombre,$Peso,$Email,$Sexo,$Tel_celular);
		
					//insertar presidente de comite
					$Puesto=1; // representa puesto de presidente de comite de barrio
					$presidente = $this->comitecolono_model->registra_miembro($id_comite,$id_colono,$Puesto);
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
						$res_iu = $this->colono_usuario_model->inserta_2_usuario($id_colono, $id_usuario->Id);
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
				echo json_encode(false);
			}
		} else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
	}

	public function detalle_comite(){
		if($this->session->userdata('tipo')==1){
			if($this->input->post()){
				$comite = $this->input->post('comite');
				$data['detalle_comite'] = $this->especial_model->detalle_comite($comite);
				$data['contenido'] = 'administrador/detalle_comite';
				$this->load->view('administrador/template',$data);
			}else{
				$this->session->sess_destroy();
			}
		}else{
			$this->session->sess_destroy();
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

	public function get_comites(){
		if ($this->input->post()) {
			$id_municipio = $this->input->post('municipio_id');
			$comites = $this->comite_model->get_comites($id_municipio);
			echo json_encode($comites);
		}else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
	}

	public function soporte(){
		if($this->session->userdata('tipo')==1){
			$data['contenido'] = "administrador/soporte";
			$this->load->view('administrador/template',$data);
		} else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
	}

	public function presidentes_comite(){
		if($this->session->userdata('tipo')==1){
			$data['contenido'] = "administrador/presidentes_comite";
			$this->load->view('administrador/template',$data);
		}else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
	}

	public function get_presidentes(){
		if($this->session->userdata('tipo')==1){
			$presidente = $this->especial_model->get_presidentes();
			echo json_encode($presidente);
		}else{
			$this->session->sess_destroy();
			redirect('ecolonia');
		}
	}

	public function valida_presidente(){
		if($this->session->userdata('tipo')==1){
			if($this->input->post()){
				$Nombre = $this->input->post('nombre');
				$ApellidoPaterno = $this->input->post('apaterno');
				$ApellidoMaterno = $this->input->post('amaterno');
				$puesto = 1; // presidente
				$status = 1; // activo
				$existe = $this->especial_model->valida_presidente($Nombre,$ApellidoPaterno,$ApellidoMaterno,$puesto,$status);
				if(is_object($existe)){
					echo json_encode(true);
				}else{
					echo json_encode(false);
				}
			}else{
				$this->session->sess_destroy();
			}
		}else{
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