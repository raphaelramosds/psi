<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProntuariosController extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index($idpaciente){
		if ($this->session->userdata('crp') == NULL) {
			redirect('/');
		}
		$this->session->set_userdata('paciente', $idpaciente);
		redirect('prontuarioscontroller/view');
	}

	public function view(){
		$psicologo	= $this->session->userdata('crp');
		$crp 				= $psicologo[0]->crp;
		$paciente 	= $this->session->userdata('paciente');

		$user['nomeusuario'] = $this->session->userdata('nomeusuario');
		$this->load->view('Home/menu', $user);
		$this->load->model('ProntuariosModel');
		$data = array(
			//Mostre os prontuários relacionados ao psicologo e ao paciente...
			'dataprontuarios' => $this->ProntuariosModel->view($crp, $paciente),
			'delete' => $this->session->flashdata('delete')
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
			'psicologo_crp' => $this->input->post('psicologocrp'),
			'tratamentoadotado'=> $this->input->post('tratamentoadotado'),
			'evolucao' => $this->input->post('evolucao')
		);
		return $dados;
	}

	public function create($paciente){
		$this->load->model('ClinicasModel', 'clinicas');
		$this->load->model('PacientesModel','pacientes');


		$psicologo = $this->session->userdata('crp');
		$crp = $psicologo[0]->crp;

		$data = array(
			'crp' => $crp,
			'clinicas' => $this->clinicas->view($crp),
			'paciente' => $paciente
		);

		$user['nomeusuario'] = $this->session->userdata('nomeusuario');
		$this->load->view('Home/menu',$user);
		$this->load->view('Prontuarios/create',$data);
	}

	public function add(){
		$this->load->model('ProntuariosModel');
		$dados = $this->get();
		$this->ProntuariosModel->add($dados);
		$this->session->userdata('paciente');
		redirect("prontuarioscontroller/view");
	}

	public function delete($idprontuario=NULL){
		$this->load->model('ProntuariosModel');
		$this->ProntuariosModel->delete($idprontuario);
		$this->session->set_flashdata('delete','Sucesso ao deletar a ficha');
		$this->session->userdata('paciente');
		redirect('prontuarioscontroller/view');
	}

	public function edit($id){
		$this->load->model('ClinicasModel', 'clinicas');
		$this->load->model('PacientesModel','pacientes');
		$this->load->model('ProntuariosModel');


		$psicologo = $this->session->userdata('crp');
		$crp = $psicologo[0]->crp;

		$dados = array(
			'prontuarios' => $this->ProntuariosModel->recuperarId($id),
			'clinicas' => $this->clinicas->view($crp),
			'pacientes' => $this->pacientes->view($crp)
		);

		$user['nomeusuario'] = $this->session->userdata('nomeusuario');

		$this->load->view('Home/menu',$user);
		$this->load->view('Prontuarios/update', $dados);
	}

	public function update(){
		$this->load->model('ProntuariosModel','pront');
		$this->pront->numeroprontuario = $this->input->post('numeroprontuario');
		$dados = $this->get();
		$this->pront->update($dados);
		$this->session->userdata('paciente');
		redirect('prontuarioscontroller/view');
	}

}
