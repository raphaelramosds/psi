<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AgendaController extends CI_Controller 
{
	public $usr;

	public function __construct()
	{
		parent::__construct();
		$this->usr = $this->session->userdata('usuario');
		$this->load->model('ClinicasModel', 'clinicas');
		$this->load->model('SecretariasModel','secretarias');	
		$this->load->model('PacientesModel','pacientes');
		$this->load->model('AgendasModel','agendas');
		if ($this->usr == NULL) 
		{
			redirect('/');
		}
    }

    public function addPaciente()
    {
        $paciente_reg = $this->input->post();

        $this->pacientes->add($paciente_reg);
        $this->session->set_flashdata("add_paciente",'Adcionado com sucesso!');

        redirect('create-agenda');
    }

    public function index()
    {
    	$data_agenda = $this->agendas->view($this->usr[0]['id']);

		$this->load->view('Home/menu', array('nome' => $this->usr[0]['nome']));
		$this->load->view('Agenda/index', array('agendas' => $data_agenda));

    }

    public function create()
    {
    	$data_create = array(
    		'pacientes' => $this->pacientes->view($this->usr[0]['id']),
    		'clinicas'	=> $this->clinicas->view($this->usr[0]['id']),
    		'psicologo' => $this->usr[0]['id']
    	);

    	$this->load->view('Home/menu', array('nome' => $this->usr[0]['nome']));
    	$this->load->view('Agenda/create', $data_create);
    }

    public function search()
    {

    }

    public function add()
    {
        $this->agendas->add($this->input->post());
        redirect('view-agenda');

    }
    
}
