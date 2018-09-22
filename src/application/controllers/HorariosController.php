<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HorariosController extends CI_Controller 
{
	public $usr;

	public function __construct()
	{
		parent::__construct();
		$this->usr = $this->session->userdata('usuario');
		$this->load->model('PacientesModel','pacientes');
		$this->load->model('HorariosModel', 'horarios');
	}

	public function create()
	{
		
		$data = array(
			'psicologo' => $this->usr[0]['id']
		);

		$this->load->view('Home/menu');
		$this->load->view('Horarios/create', $data);

	}

	public function add()
	{
		$reg = $this->input->post();

		$length = sizeof($reg['hinicial']);
		
		for($count = 0; $count < $length; $count++)
		{	
			$data = array(
				'hinicial' 		=> $reg['hinicial'][$count],
				'hfinal'		=> $reg['hfinal'][$count],
				'data'			=> $reg['data'][$count],
				'psicologo_id' 	=> $reg['psicologo_id'],
				'paciente_id'	=> NULL
			);
			
			$this->horarios->add($data);
		}
		redirect('view-agenda');
	}
}