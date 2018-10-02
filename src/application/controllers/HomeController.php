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
		$this->load->model('SecretariasModel','secretarias');
		$this->load->model('AgendasModel','agenda');
		if ($this->usr == NULL) 
		{
			redirect('/');
		}

	}

	public function index()
	{
		$h = ($this->usr[1]['role'] == 2)?$this->agenda->get_event_by_psi($this->usr[0]['psicologo_id']):NULL;

		$count_registers = array(
			'counterhorarios' => $h,
			'countersecretaria' => $this->secretarias->count_results($this->usr[0]['id']),
			'counterclinica' => $this->clinicas->count_results($this->usr[0]['id']),
			'counterpaciente'=> $this->pacientes->count_results($this->usr[0]['id']),
			'update_info' => $this->session->flashdata('update_info'),
		);

		$this->load->view('Home/menu');
		$this->load->view('Home/index', $count_registers);
	}

	public function viewcid()
	{	
		$url = base_url("assets/xml/doencas.xml");
		$xml = simplexml_load_file($url);

		$this->load->view('Home/menu', array('nome' => $this->usr[0]['nome']));
		$this->load->view('Home/viewcid', array('cid' => $xml));
	}

	public function loggout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}

}
