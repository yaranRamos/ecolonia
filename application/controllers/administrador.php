<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrador extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('casa_model');
		$this->load->model('colono_model');
		$this->load->model('estado_model');
		$this->load->model('municipio_model');
	}

	public function index()
	{
		$this->load->view('administrador/header_admon');
		$this->load->view('administrador/menu_admon');
		$this->load->view('administrador/footer_admon');
	}

	public function menu_estructura()
	{
		$this->load->view('administrador/header_admon');
		$this->load->view('administrador/menu_estructura');
		$this->load->view('administrador/footer_admon');
	}

	public function registrar_colono()
	{
		// Cargamos todos lo estados de la base de datos
		$estados = $this->estado_model->get_estados();
		$data = array(
			'estado' => $estados
		);
		$this->load->view('administrador/header_admon');
		$this->load->view('administrador/registrar_colono',$data);
		$this->load->view('administrador/footer_admon');
	}

	public function registrar_ayuntamiento()
	{
		$this->load->view('administrador/header_admon');
		$this->load->view('administrador/registrar_ayuntamiento');
		$this->load->view('administrador/footer_admon');
	}

	public function registrar_comite()
	{
		$this->load->view('administrador/header_admon');
		$this->load->view('administrador/registrar_comite');
		$this->load->view('administrador/footer_admon');
	}

	public function registrar()
	{
		$this->load->view('administrador/header_admon');
		$this->load->view('administrador/registrar');
		$this->load->view('administrador/footer_admon');
	}

	public function registrar_casa(){
		if($this->input->post()){
			$calle = $this->input->post('calle');
			$colonia = $this->input->post('colonia');
			$familia = $this->input->post('familia');
			$numero = $this->input->post('numero');
			$tel_casa = $this->input->post('telefono');
			$inserta_casa = $this->casa_model->registra_casa($calle,$colonia,$familia,$numero,$tel_casa);
			if($inserta_casa){
				$result = $this->casa_model->obtener_id($calle,$colonia,$familia,$numero,$tel_casa);
				$id_casa = $result->id;
				echo json_encode($id_casa);
			} else{
				echo json_encode($inserta_casa);
			}
		} else{
			$resp = false;
			echo json_encode($resp);
		}
	}
	public function resibe_datos_colono(){
		if($this->input->post()){
			$datos = $this->input->post('colonos');
			$array_colono = array();
			$cont1 = 0;
			foreach($datos as $row) {
				$Casa = $datos[$cont1][0];
				$ApellidoPaterno = $datos[$cont1][1];
				$ApellidoMaterno = $datos[$cont1][2];
				$FechaNacimiento = $datos[$cont1][3];
				$Estatura = $datos[$cont1][4];
				$Nombre = $datos[$cont1][5];
				$Peso = $datos[$cont1][6];
				$Email = $datos[$cont1][7];
				$Sexo = $datos[$cont1][8];
				$Tel_celular = $datos[$cont1][9];
				$inserta_colono = $this->colono_model->inserta_colono($Casa,$ApellidoPaterno,$ApellidoMaterno,$FechaNacimiento,$Estatura,$Nombre,$Peso,$Email,$Sexo,$Tel_celular);
				$cont1++;
			}
			echo json_encode($inserta_colono);
		} else{
			$resp = false;
			echo json_encode($resp);
		}
	}

	public function get_municipios(){
		if($this->input->post()){
			$id_estado = $this->input->post('estado_id');
			$municipios = $this->municipio_model->get_municipios($id_estado);
			echo json_encode($municipios);
		}
	}
}