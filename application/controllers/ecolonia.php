<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ecolonia extends CI_Controller {

	public function index()
	{
		$this->load->view('home/header_home');
		$this->load->view('home/inicio_home');
		$this->load->view('home/footer_home');
	}

	public function casos_exito()
	{
		$this->load->view('home/header_home');
		$this->load->view('home/casos_home');
		$this->load->view('home/footer_home');
	}

	public function intervencion()
	{
		$this->load->view('home/header_home');
		$this->load->view('home/intervencion_home');
		$this->load->view('home/footer_home');
	}

	public function iniciar_sesion()
	{
		$this->load->view('home/header_home');
		$this->load->view('home/iniciar_sesion');
		$this->load->view('home/footer_home');
	}
	
}