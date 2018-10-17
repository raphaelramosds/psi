<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AgendaController extends CI_Controller 
{
	public $usr;

	public function __construct()
	{
		parent::__construct();
		
		$this->usr = $this->session->userdata('usuario');

		$this->load->model('PacientesModel','pacientes');
		$this->load->model('ClinicasModel','clinicas');
		$this->load->model('AgendasModel', 'agendas');

		if ($this->usr == NULL || $this->usr[1]['role'] == 2)
		{
			redirect('login');
		}

	}

	// id int primary key not null auto_increment,
	// clinica_id int,
	// paciente_id int, 
	// dia date,
	// horario time

	public function add()
	{
		$datainicio = $this->input->post('diainicio');
		$datafim = $this->input->post('diafim');
		$hora = $this->input->post('hora');

		$dados = array(
			'clinica_id' => $this->input->post('clinica_id'),
			'paciente_id' => NULL
		);

		// Trazer Intervalo de datas

		$timestamp1 = strtotime($datainicio);
		$timestamp2 = strtotime($datafim);

		$cont = 1;

		$dias = array();

		while($timestamp1 <= $timestamp2){

			$dias[] = date('Y-m-d', $timestamp1);

			$timestamp1 += 86400;
			$cont++;
		}

		// Trazer acréscimo de intervalos nas horas
		for($x=0;$x < sizeof($dias); $x++)
		{
			$dados['dia'] = $dias[$x];
			
			for($i=0; $i < sizeof($hora); $i++)
			{
				$dados['horario'] = $hora[$i];
				$this->agendas->add($dados);
			}
		}

		$this->session->set_flashdata("success","Agenda cadastrada! Encontre ela filtrando abaixo pela clínica");
		redirect('view-agenda');

	}

	public function view()
	{
		$dados = array(
			'clinica' => $this->clinicas->view($this->usr[0]['id'])

		);

		$this->load->view('Home/menu');
		$this->load->view('Agenda/index', $dados);
	}

	public function search(){
		$clinica = $this->input->post('clinica_id');
		$dia = $this->input->post('dia');

		$dados['agendas'] = $this->agendas->search($this->usr[0]['id'], $clinica, $dia);
		
		$this->load->view('Home/menu');
		$this->load->view('Agenda/index');
	}

}
	