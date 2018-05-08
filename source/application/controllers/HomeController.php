<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	public function index(){
		if ($this->session->userdata('crp') == NULL) {
			$erro_sessao = "<div class='ls-alert-info'><strong>Ops!</strong> Faça o seu login antes de entrar...</div>";
			$this->session->set_flashdata('erro_sessao', $erro_sessao);
			redirect('/');
		}
		$this->load->model('ClinicasModel');
		$this->load->model('PacientesModel');

		//Recuperar nome do psicólogo pelo CRP
		$username = $this->session->userdata('crp');
		$this->db->select("nomepsicologo");
		$this->db->from('psicologo');
		$this->db->where('crp', $username[0]->crp);
		$query = $this->db->get()->result();
		//Criou-se uma sessão para o nome do usuário, por que ela deve ser chamada em todos os controladores

		$this->session->set_userdata('nomeusuario', $query);
		$psicologo = $this->session->userdata('crp');
		$crp = $psicologo[0]->crp;
		$dados = array(
			'countersclinica' => $this->ClinicasModel->view($psicologo[0]->crp),
			"counterpaciente" => $this->PacientesModel->view($crp),
			'titulo' => 'Tela inicial',
			'nomeusuario' => $this->session->userdata('nomeusuario'),
		);

		$this->load->view('Home/menu', $dados);
		$this->load->view('Home/index',$dados);
	}

	public function loggout(){
		$this->session->unset_userdata('crp');
		$this->session->unset_userdata('nomeusuario');
		redirect('/');
	}

}
