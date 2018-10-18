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

	public function segundos_em_tempo($segundos){
		$horas = floor($segundos/3600);
		$minutos = floor($segundos%3600/60);
		$segundo = $segundos%60;

		return sprintf("%d:%02d:%02d", $horas, $minutos, $segundo);
	}

	public function add()
	{
		$datainicio = $this->input->post('diainicio');
		$datafim = $this->input->post('diafim');
		$hora = $this->input->post('hora');
		$qtde = $this->input->post('qtde');
		$intervalo = $this->input->post('intervalo');

		// Calcular intervalo de hora

		// Faça o calculo do intervalo apenas de ele estiver preenchido
		if(!empty($intervalo)){

			list($h1,$m1) = explode(':',$intervalo);
			$s1 = $h1 * 3600 + $m1 * 60;
		
		}

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

		$cont2 = 0;
		$horarios = array();

		$horarios[] = $hora[0];


		for($x=0;$x < sizeof($dias); $x++)
		{
			$dados['dia'] = $dias[$x];
			
			for($i=0; $i < sizeof($hora); $i++)
			{
				if($qtde == 0 ){
					$dados['horario'] = $hora[$i];
					$this->agendas->add($dados);
				}

				else
				{
					while ($cont2 < $qtde)
					{
						list($h2,$m2) = explode(':',$hora[$i]);

						$s2 = $h2 * 3600 + $m2  * 60;
						
						// $s2 é horários informados
						// $s1 é valor do intervalo

						$horarios[] = $this->segundos_em_tempo($s1 + $s2);

						// Substitua o próximo valor pelo resultado anterior
						$hora[$i] = $this->segundos_em_tempo($s1 + $s2);

						$cont2++;
					}	

					for($a=0; $a < sizeof($horarios); $a++)
					{
						$dados['horario'] = $horarios[$a];
						$this->agendas->add($dados);
					}
				}
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
	