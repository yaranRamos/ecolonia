<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alternativa extends CI_Controller {

	public function index()
	{
		$this->load->view('home/header_home');
		$this->load->view('home/alt_inicio_home');
		$this->load->view('home/footer_home');
	}
}