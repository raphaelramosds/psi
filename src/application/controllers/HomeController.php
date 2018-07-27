<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller 
{
	public $psicologo;

	public function __construct()
	{
		parent::__construct();
		$this->psicologo = $this->session->userdata('usuario');
	}

	public function index()
	{
		if ($this->psicologo == NULL) {
			redirect('/');
		}
		print_r($this->psicologo);

		$this->load->model('ClinicasModel',"clinicas");
		$this->load->model('PacientesModel',"pacientes");

		$this->load->view('Home/menu', array('nomepsicologo'=>$this->psicologo[0]->nomepsicologo));
		$this->load->view('Home/index', array(
			'countersclinica' => $this->clinicas->count_results($this->psicologo[0]->idpsicologo),
			'counterpaciente' => $this->pacientes->count_results($this->psicologo[0]->idpsicologo),
			'titulo' 		  => 'Início',
		));
	}

	public function loggout()
	{
		$this->session->unset_userdata('psicologo');
		redirect('/');
	}

}
