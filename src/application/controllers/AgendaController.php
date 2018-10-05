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
	    $registros = $this->input->post();
		
	    $data = array();

	    for ($i=0; $i < count($registros['dinicial']); $i++) { 
	    	$data['start'] = $registros['dinicial'][$i]." ".$registros['ihora'][$i];
	    	$data['end'] = $registros['dfinal'][$i]." ".$registros['fhora'][$i];
	    	$data['title'] = $registros['title'][$i];
	    	$data['psicologo_id'] = $registros['psicologo_id'];
	    	$this->agendas->add_event($data);
	    }

	    redirect('view-agenda');
	}

	public function update()
	{
		$dados = $this->input->post();
		$this->agendas->id = $dados['id'];
		$this->agendas->update_event($dados);
		redirect('view-agenda');
	}
    
}
