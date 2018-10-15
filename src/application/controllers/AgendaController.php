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
		
		$dinicio = $registros['dinicial'];
		$dfinal = $registors['dfinal'];
		
		$timestamp1 = strtotime( $d1 );
		$timestamp2 = strtotime( $d2 );		
		
		$cont = 1;
		
		$dias = array();
		
		while ( $timestamp1 <= $timestamp2 )
		{
			$dia = $cont . ' - ' . date( 'd/m/Y', $timestamp1 ) . PHP_EOL;
			
			$dias[] = $dia;
			
			$timestamp1 += 86400;
			$cont++;
		}
		
		$intervalo = $registros['intervalo'];
		$horainicio = $registros['ihora'];
		$horafinal = $registros['fhora'];

		list($h1,$m1,$s1) = explode(':',$intervalo);

		$c1 = $h1 * 3600 + $m1 * 60 + $s1;

		$data = array();

		// O $data['fhora'] vai ser a soma do intervalo mais a hora inicial
		// Depois é só concatenar em $data['end'] 

		for ($i=0; $i < count($registros['dinicial']); $i++) { 
			
		$data['start'] = $dias[$i]." ".$horainicio[$i];

		// Somar os dois valores
		list($h2,$m2,$s2) = explode(':',$horainicio[$i]);

		$c2 = $h2 * 3600 + $m2 * 60 + $s2;

		$resultado = $this->segundos_em_tempo($c1 + $c2);

		if ($registros['title'][$i] == NULL)
		{
			$registros['color'][$i] = 'green';
			$data['color'] = $registros['color'][$i]
		}

		else
		{
			$registros['color'][$i] = 'red';
			$data['color'] = $registros['color'][$i]
		}


		$data['end'] = $dias[$i]." ".$resultado;

		$data['title'] = $registros['title'][$i];
		$data['psicologo_id'] = $registros['psicologo_id'];
		$this->agendas->add_event($data);
		}

		redirect('view-agenda');
	}

	public function update()
	{
		$dados = $this->input->post();
		
		if($dados['title'] != NULL)
		{
			$dados['color'] = 'red';	
		}
		
		$this->agendas->id = $dados['id'];
		$this->agendas->update_event($dados);
		redirect('view-agenda');
	}
    
}
