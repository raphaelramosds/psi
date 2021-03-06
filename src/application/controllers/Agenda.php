<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller 
{
	public $usr;

	public function __construct()
	{
		parent::__construct();
		
		$this->usr = $this->session->userdata('usuario');

		$this->load->model('PacientesModel','pacientes');
		$this->load->model('ClinicasModel','clinicas');
		$this->load->model('AgendasModel', 'agendas');

		$this->load->view('Home/menu');

		if ($this->usr == NULL)
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
			'psicologo_id' => $this->input->post('psicologo_id')
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
		$id = ($this->usr[1]['role'] == 1) ? $this->usr[0]['id'] : $this->usr[0]['psicologo_id'];
		
		$dados = array(
			'clinica' => $this->clinicas->view($id)
		);

		$this->load->view('Agenda/index', $dados);
	}

	public function search()
	{
		$clinica = $this->input->post('clinica_id');

		list($ano, $mes) = explode("-", $this->input->post('mes'));

		// Se o usuário logado for um psicólogo, então será seu próprio ID
		// Caso for um secretário, será sua chave estrangeira
		$id = ($this->usr[1]['role'] == 1) ? $this->usr[0]['id'] : $this->usr[0]['psicologo_id'];
		
		$dados['agendas'] = $this->agendas->search($id, $clinica, $mes, $ano);
		$dados['clinica'] = $this->clinicas->view($id);
		$dados['mes'] = $this->input->post('mes');
		
		if(count($dados['agendas'])==0)
		{
			$this->session->set_flashdata('vazio',"Não há nenhum horário nessa clínica ou mês");
		}

		else{
			$this->session->set_flashdata('vazio',"");
		}

		$this->session->set_userdata('agendas',$dados);
		$this->load->view('Agenda/index', $dados);

	}

	public function delete($id){

		$this->agendas->delete($id);

	}

	public function update(){
		$dados = $this->input->post();
		$this->agendas->id = $dados['id'];
		$result = $this->agendas->update($dados);

		$this->session->set_flashdata('success',"Adicionado com sucesso, filtre a agenda para ver os horário");
		$this->load->view('Agenda/index', $this->session->userdata('agendas'));
	}

	// Preencher campos das informações do paciente que está relacionadas ao horário 
	public function recuperarPaciente()
	{
		$q = "SELECT * FROM ".$this->db->dbprefix('agenda')." AS a WHERE a.id = ".$this->input->post('id');
		$result = $this->db->query($q)->result();
		echo json_encode($result);
		exit;
	}

	// A partir do nome e o id do psicólogo, essa query vai retornar todos os emails, telefones e nomes dos pacientes filtrados
	public function recuperarPacientes()
	{
		$id = ($this->usr[1]['role'] == 1) ? $this->usr[0]['id'] : $this->usr[0]['psicologo_id'];
		$result = $this->pacientes->search($id, $this->input->post('nomePesquisa'));
		echo json_encode($result);
		exit;


	}
}
	