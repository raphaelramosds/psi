<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{
	public $usr;

	public function __construct()
	{
		parent::__construct();
		$this->usr = $this->session->userdata('usuario');
		$this->load->model('ClinicasModel',"clinicas");
		$this->load->model('PacientesModel',"pacientes");
		$this->load->model('ProntuariosModel','prontuarios');
		if ($this->usr == NULL) 
		{
			redirect('/');
		}

	}

	public function index()
	{

		$count_registers = array(
			'countersprontuario' => $this->prontuarios->count_results($this->usr[0]['id']),
			'counterclinica' => $this->clinicas->count_results($this->usr[0]['id']),
			'counterpaciente'=> $this->pacientes->count_results($this->usr[0]['id']),
			'update_info' => $this->session->flashdata('update_info'),
		);

		$this->load->view('Home/menu');

		if($this->usr[1]['role'] == 2)
		{
			$id = $this->usr[0]['psicologo_id'];
		
			$dados = array(
				'clinica' => $this->clinicas->view($id)
			);
	
			$this->load->view('Agenda/index', $dados);
		}

		else
		{
			$this->load->view('Home/index', $count_registers);
		}
	}

	public function viewcid()
	{	
		$url = "assets/xml/doencas.xml";
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
