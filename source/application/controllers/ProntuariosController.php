<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProntuariosController extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index($idpaciente){
		if ($this->session->userdata('psicologo') == NULL) {
			redirect('/');
		}
		$this->session->set_userdata('paciente', $idpaciente);
		redirect('ProntuariosController/view');
	}

	public function view(){
		$paciente 	= $this->session->userdata('paciente');

		$this->load->model("ClinicasModel","clinicas");

		$psicologo	= $this->session->userdata('psicologo');
		$idpsicologo = $psicologo[0]->idpsicologo;

		$user['nomepsicologo'] = $this->session->userdata('nomepsicologo');
		$this->load->view('Home/menu', $user);
		$this->load->model('ProntuariosModel');
		$data = array(
			//Mostre os prontuários relacionados ao psicologo e ao paciente...
			'dataprontuarios' => $this->ProntuariosModel->view($idpsicologo, $paciente),
			'delete' => $this->session->flashdata('delete'),
			'clinicas' => $this->clinicas->view($idpsicologo),
			"psicologo" => $idpsicologo
		);
		$this->load->view('Prontuarios/index', $data);
	}

	//Fazer uma função que recupere todos os dados do prontuário pelo input
	public function get(){
		$dados = array(
			'alta' => $this->input->post('alta'),
			'cid10' => $this->input->post('cid10'),
			'clinica_id' => $this->input->post('clinicaid'),
			'diagnostico'=>$this->input->post('diagnostico'),
			'encaminhado'=>$this->input->post('encaminhado'),
			'numeroprontuario'=>$this->input->post('numeroprontuario'),
			'paciente_id' => $this->input->post('paciente_id'),
			'id_psicologo' => $this->input->post('id_psicologo'),
			'tratamentoadotado'=> $this->input->post('tratamentoadotado'),
			'evolucao' => $this->input->post('evolucao')
		);
		return $dados;
	}

	public function add(){
		$this->load->model('ProntuariosModel');
		$dados = $this->get();
		$this->ProntuariosModel->add($dados);

		$add = $this->session->userdata('paciente');
		$this->session->set_flashdata('add',$add);

		redirect("PacientesController");
	}

	public function delete($idprontuario=NULL){
		$this->load->model('ProntuariosModel');
		$this->ProntuariosModel->delete($idprontuario);

		$delete = $this->session->userdata('paciente');
		$this->session->set_flashdata('delete', $delete);

		redirect('PacientesController');
	}

	public function edit($id){
		$this->load->model('ClinicasModel', 'clinicas');
		$this->load->model('PacientesModel','pacientes');
		$this->load->model('ProntuariosModel');


		$psicologo = $this->session->userdata('psicologo');
		$psicologo = $psicologo[0]->idpsicologo;

		$dados = array(
			'prontuarios' => $this->ProntuariosModel->recuperarId($id),
			'clinicas' => $this->clinicas->view($psicologo),
			'pacientes' => $this->pacientes->view($psicologo)
		);

		$user['nomepsicologo'] = $this->session->userdata('nomepsicologo');

		$this->load->view('Home/menu',$user);
		$this->load->view('Prontuarios/update', $dados);
	}

	public function update(){
		$this->load->model('ProntuariosModel','pront');
		$this->pront->numeroprontuario = $this->input->post('numeroprontuario');
		$dados = $this->get();	
		$this->pront->update($dados);

		$edit = $this->session->userdata("paciente");
		$this->session->set_flashdata('update_prontuario',$edit);
		
		redirect('PacientesController');
	}

}
