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
		
		$preferences = array(
			'show_next_prev' 	=> TRUE,
			'start_day'    		=> 'saturday',
			'month_type'   		=> 'long',
			'day_type'     		=> 'short'
		);

		$this->load->library('calendar', $preferences);

		if ($this->usr == NULL) 
		{
			redirect('/');
		}
    }

    public function index()
    {
		$data_agenda = $this->agendas->view($this->usr[0]['id']);
		$data = array(
			'calendario' 	=> $this->calendar->generate($this->uri->segment(3),$this->uri->segment(4)),
			'agendas'		=> $data_agenda
		);

		$this->load->view('Home/menu');
		$this->load->view('Agenda/index', $data);

    }

    public function create()
    {
    	$data_create = array(
    		'clinicas'	=> $this->clinicas->view($this->usr[0]['id']),
    		'psicologo' => $this->usr[0]['id']
    	);

    	$this->load->view('Home/menu');
    	$this->load->view('Agenda/create', $data_create);
    }


    public function add()
    {
        $this->agendas->add($this->input->post());
        redirect('view-agenda');
    }
    
}
