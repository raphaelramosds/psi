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
			"psicologo" => $idpsicologo,
			"add_prontuario" => $this->session->flashdata('add_prontuario'),
			"delete_prontuario" => $this->session->flashdata('delete_prontuario'),
			"update_prontuario" => $this->session->flashdata('update_prontuario'),
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
		$add_prontuario = "<div class='ls-background-primary ls-sm-space ls-sm-margin-bottom ls-text-md ls-ico-checkmark'>Adcionado com sucesso! </div>";

		$this->load->model('ProntuariosModel');
		$prontuario_reg = $this->get();
		$this->ProntuariosModel->add($prontuario_reg);
		$this->session->set_flashdata("add_prontuario",$add_prontuario);
		redirect("view-paciente");
	}

	public function delete($idprontuario=NULL){
		$delete_prontuario = "<div class='ls-background-primary ls-sm-space ls-sm-margin-bottom ls-text-md ls-ico-checkmark'>Deletado com sucesso!</div>";

		$this->load->model('ProntuariosModel');
		$this->ProntuariosModel->delete($idprontuario);
		$this->session->set_flashdata("delete_prontuario",$delete_prontuario);
		redirect('view-prontuario');
	}

	public function edit($id){
		$this->load->model('ClinicasModel', 'clinicas');
		$this->load->model('PacientesModel','pacientes');
		$this->load->model('ProntuariosModel','prontuarios');


		$psicologo = $this->session->userdata('psicologo');
		$psicologo = $psicologo[0]->idpsicologo;

		$dados = array(
			'prontuarios' => $this->prontuarios->view_id($id),
			'clinicas' => $this->clinicas->view($psicologo),
			'pacientes' => $this->pacientes->view($psicologo)
		);

		$user['nomepsicologo'] = $this->session->userdata('nomepsicologo');

		$this->load->view('Home/menu',$user);
		$this->load->view('Prontuarios/update', $dados);
	}

	public function update(){
		$update_prontuario = "<div class='ls-background-primary ls-sm-space ls-sm-margin-bottom ls-text-md ls-ico-checkmark'>Atualizado com sucesso! </div>";

		$this->load->model('ProntuariosModel','prontuarios');
		$this->prontuarios->numeroprontuario = $this->input->post('numeroprontuario');
		$dados = $this->get();	
		$this->prontuarios->update($dados);
		$this->session->set_flashdata("update_prontuario",$update_prontuario);
		redirect('view-prontuario');
	}

}
