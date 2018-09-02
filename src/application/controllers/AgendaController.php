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
		$this->load->model('AgendasModel','agendas');
		if ($this->usr == NULL) 
		{
			redirect('/');
		}
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
    		'clinicas'	=> $this->clinicas->view($this->usr[0]['id']),
    		'psicologo' => $this->usr[0]['id']
    	);

    	$this->load->view('Home/menu', array('nome' => $this->usr[0]['nome']));
    	$this->load->view('Agenda/create', $data_create);
    }


    public function add()
    {
        $this->agendas->add($this->input->post());
        redirect('view-agenda');
    }
    
}
