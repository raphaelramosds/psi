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

	public function segundos_em_tempo($segundos){
		$horas = floor($segundos/3600);
		$minutos = floor($segundos%3600/60);
		$segundos = $segundos%60;

		return sprintf("%d:%02d:%02d", $horas, $minutos, $segundos);
	}

	public function add() 
	{
	    $registros = $this->input->post();

	    $intervalo = $registros['intervalo'];
	    $horainicio = $registros['ihora'];
	    $horafinal = $registros['fhora'];

	    list($h1,$m1,$s1) = explode(':',$intervalo);

	    $c1 = $h1 * 3600 + $m1 * 60 + $s1;
		
	    $data = array();

	    // O $data['fhora'] vai ser a soma do intervalo mais a hora inicial
	    // Depois é só concatenar em $data['end'] 

	    for ($i=0; $i < count($registros['dinicial']); $i++) { 
	    	$data['start'] = $registros['dinicial'][$i]." ".$horainicio[$i];
	    	
	    	// Somar os dois valores
	    	list($h2,$m2,$s2) = explode(':',$horainicio[$i]);

	    	$c2 = $h2 * 3600 + $m2 * 60 + $s2;

	    	$resultado = $this->segundos_em_tempo($c1 + $c2);

	    	$data['end'] = $registros['dfinal'][$i]." ".$resultado;

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
