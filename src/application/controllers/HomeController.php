<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller 
{
	public $usr;

	public function __construct()
	{
		parent::__construct();
		$this->usr = $this->session->userdata('usuario');
		$this->load->model('ClinicasModel',"clinicas");
		$this->load->model('PacientesModel',"pacientes");
		$this->load->library('Role');	
	}

	public function index()
	{
		if ($this->usr == NULL) 
		{
			redirect('/');
		}

		$count_registers = array(
			'countersclinica' => $this->clinicas->count_results($this->usr[0]->id),
			'counterpaciente' => $this->pacientes->count_results($this->usr[0]->id),
			'titulo' 		  => 'Início'
		);

		$request_view = $this->role->menuView($this->usr[0]->usuario_idusuario);

		$this->load->view($request_view['menu'], array('nome'=>$this->usr[0]->nome));
		$this->load->view($request_view['index'], $count_registers);
	}

	public function loggout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}

}
