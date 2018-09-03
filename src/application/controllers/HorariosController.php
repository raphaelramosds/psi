<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HorariosController extends CI_Controller 
{
	public $usr;

	public function __construct()
	{
		parent::__construct();
		$this->usr = $this->session->userdata('usuario');
		$this->load->model('AgendasModel','agendas');
		$this->load->model('PacientesModel','pacientes');
	}

	public function create()
	{
		$reg 	= $this->input->post();
		$this->agendas->add($reg);

		$mes 	= $reg['mes'];
		$ano    = $reg['ano'];
		$q 		= "SELECT * FROM agenda as a WHERE a.mes = $mes AND a.ano = $ano";
		$r      = $this->db->query($q)->row_array();
		$d		= array(
			'agenda'	=> $r['id']
		);
		
		$this->load->view('Home/menu',array('nome' => $this->usr[0]['nome']));
		$this->load->view('Horarios/create', $d);

	}

	public function add()
	{
		$reg = $this->input->post();
		$dados['horarios'] = $reg;
		$this->load->view('Home/menu', array('nome' => $this->usr[0]['nome']));
		$this->load->view('Agenda/index', $dados);

	}
}