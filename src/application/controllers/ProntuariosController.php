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
		redirect('view-prontuario');
	}

	public function view(){
		$paciente = $this->session->userdata('paciente');

		$this->load->model("ClinicasModel","clinicas");

		$psicologo	= $this->session->userdata('psicologo');
		$idpsicologo = $psicologo[0]->idpsicologo;

		$this->load->view('Home/menu', array('nomepsicologo'=>$this->session->userdata('nomepsicologo')));
		$this->load->model('ProntuariosModel','prontuarios');

		$this->load->view('Prontuarios/index', array(
			//Mostre os prontuários relacionados ao psicologo e ao paciente...
			'dataprontuarios' 	=> $this->prontuarios->view($idpsicologo, $paciente),
			'delete' 			=> $this->session->flashdata('delete'),
			'clinicas' 			=> $this->clinicas->view($idpsicologo),
			"psicologo" 		=> $idpsicologo,
			"add_prontuario" 	=> $this->session->flashdata('add_prontuario'),
			"delete_prontuario" => $this->session->flashdata('delete_prontuario'),
			"update_prontuario" => $this->session->flashdata('update_prontuario'),
		));
	}

	public function get(){
		return array(
			'alta' 		 		=> $this->input->post('alta'),
			'cid10' 	 		=> $this->input->post('cid10'),
			'clinica_id' 		=> $this->input->post('clinicaid'),
			'diagnostico'		=> $this->input->post('diagnostico'),
			'encaminhado'		=> $this->input->post('encaminhado'),
			'numeroprontuario'	=> $this->input->post('numeroprontuario'),
			'paciente_id' 		=> $this->input->post('paciente_id'),
			'id_psicologo' 		=> $this->input->post('id_psicologo'),
			'tratamentoadotado'	=> $this->input->post('tratamentoadotado'),
			'evolucao' 			=> $this->input->post('evolucao')
		);
	}

	public function add(){
		$this->load->model('ProntuariosModel','prontuarios');

		$prontuario_reg = $this->get();

		$this->prontuarios->add($prontuario_reg);

		$this->session->set_flashdata("add_prontuario",'Adcionado com sucesso!');
		$this->index($prontuario_reg['paciente_id']);

	}

	public function delete($idprontuario=NULL){
		$this->load->model('ProntuariosModel','prontuarios');
		$this->prontuarios->delete($idprontuario);
		$this->session->set_flashdata("delete_prontuario","Deletado com sucesso!");
		redirect('view-prontuario');
	}

	public function edit($id){
		$this->load->model('ClinicasModel', 'clinicas');
		$this->load->model('PacientesModel','pacientes');
		$this->load->model('ProntuariosModel','prontuarios');


		$psicologo_id = $this->session->userdata('psicologo')[0]->idpsicologo;


		$this->load->view('Home/menu',array('nomepsicologo'=>$this->session->userdata('nomepsicologo')));
		$this->load->view('Prontuarios/update', array(
			'prontuarios' 	=> $this->prontuarios->view_id($id),
			'clinicas' 		=> $this->clinicas->view($psicologo_id),
			'pacientes'	    => $this->pacientes->view($psicologo_id)
		));
	}

	public function update(){

		$prontuario_reg = $this->get();	

		$this->load->model('ProntuariosModel','prontuarios');
		$this->prontuarios->numeroprontuario = $this->input->post('numeroprontuario');
		$this->prontuarios->update($prontuario_reg);
		$this->session->set_flashdata("update_prontuario",'Atualizado com sucesso');
		redirect('view-prontuario');
	}

}
