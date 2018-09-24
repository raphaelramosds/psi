	<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AgendaController extends CI_Controller 
{
	public $usr;

	public function __construct()
	{
		parent::__construct();
		$this->usr = $this->session->userdata('usuario');

		$this->load->model('AgendasModel', 'agendas');
		
		if ($this->usr == NULL) 
		{
			redirect('/');
		}
    }

    public function index()
    {
    	$data['id'] = $this->usr[1]['role'] == 2 ? $this->usr[0]['psicologo_id'] : $this->usr[0]['id'];
		$this->load->view('Home/menu');
		$this->load->view('Agenda/index',$data);

	}

	public function add() 
	{
	    /* Our calendar data */
	    $registros = $this->input->post();

		$data = explode(" ", $registros['start']);
		list($date, $hora) = $data;
		$data_sem_barra = array_reverse(explode("/", $date));
		$data_sem_barra = implode("-", $data_sem_barra);
		$start_sem_barra = $data_sem_barra . " " . $hora;
		$registros['start'] = $start_sem_barra;

		$data = explode(" ", $registros['end']);
		list($date, $hora) = $data;
		$data_sem_barra = array_reverse(explode("/", $date));
		$data_sem_barra = implode("-", $data_sem_barra);
		$end_sem_barra = $data_sem_barra . " " . $hora;
		$registros['end'] = $end_sem_barra;

	    $this->agendas->add_event($registros);
	    redirect('view-agenda');
	}

	public function update()
	{
		$dados = $this->input->post();

		$data = explode(" ", $dados['start']);
		list($date, $hora) = $data;
		$data_sem_barra = array_reverse(explode("/", $date));
		$data_sem_barra = implode("-", $data_sem_barra);
		$start_sem_barra = $data_sem_barra . " " . $hora;
		$dados['start'] = $start_sem_barra;

		$data = explode(" ", $dados['end']);
		list($date, $hora) = $data;
		$data_sem_barra = array_reverse(explode("/", $date));
		$data_sem_barra = implode("-", $data_sem_barra);
		$end_sem_barra = $data_sem_barra . " " . $hora;
		$dados['end'] = $end_sem_barra;

		$this->agendas->id = $dados['id'];
		$this->agendas->update_event($dados);
		redirect('view-agenda');
	}
    
}
