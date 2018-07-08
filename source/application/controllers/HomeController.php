<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	public function index(){
		if ($this->session->userdata('psicologo') == NULL) {
			$erro_sessao = "<div class='ls-sm-space ls-txt-center ls-color-info' style='font-size:20px;'><strong>Ops!</strong> Faça o seu login antes de entrar...</div>";
			$this->session->set_flashdata('erro_sessao', $erro_sessao);
			redirect('/');
		}
		$this->load->model('ClinicasModel');
		$this->load->model('PacientesModel');

		//Recuperar nome do psicólogo
		$user = $this->session->userdata('psicologo');
		$this->session->set_userdata('nomepsicologo', $user[0]->nomepsicologo);

		$psicologo = $this->session->userdata('psicologo');
		$idpsicologo = $psicologo[0]->idpsicologo;

		$dados = array(
			'countersclinica' => $this->ClinicasModel->view($idpsicologo),
			"counterpaciente" => $this->PacientesModel->view($idpsicologo),
			'titulo' => 'Tela inicial',
			'nomepsicologo' => $this->session->userdata('nomepsicologo'),
		);

		$this->load->view('Home/menu', $dados);
		$this->load->view('Home/index',$dados);
	}

	public function loggout(){
		$this->session->unset_userdata('psicologo');
		$this->session->unset_userdata('nomepsicologo');
		redirect('/');
	}

}
