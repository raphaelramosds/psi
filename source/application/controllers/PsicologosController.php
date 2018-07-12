<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PsicologosController extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index(){
		if ($this->session->userdata('psicologo') == NULL) {
			redirect('/');
		}
		//Recuperar dados do psicólogo através do seu CRP
		$psicologo = $this->session->userdata('psicologo');

		//Em cada controlador, chamar a sessão nomepsicologo (userdata)
		//Para recuperar a query no controlador de Home e, assim, retornar o nome do psicólgo
		$user['nomepsicologo'] = $this->session->userdata('nomepsicologo');
		$this->load->view('Home/menu', $user);

		$this->load->model('PsicologosModel');
		$data = array(
			//Enviar o CRP do psicólogo para a cláusula WHERE dentro do Model
			'datapsicologos' => $this->PsicologosModel->view($psicologo[0]->idpsicologo),
		);
		$this->load->view('Psicologos/index', $data);
	}

	public function get(){
		$dados = array(
			'crp' => $this->input->post('crp'),
			'datanascimento' => $this->input->post('datanasc'),
			'emailpsicologo' => $this->input->post('emailpsicologo'),
			'nomepsicologo' => $this->input->post('nomepsicologo'),
			'sexopsicologo' => $this->input->post('sexopsicologo'),
			'usuario_idusuario' =>  $this->input->post('idusuario'),
		);
		return $dados;
	}


	public function create(){
		//Receba o id do usuário que foi enviado do cadastro pela query do model usuário...
		$data["id_user"] = $this->session->userdata("id_user");
		$this->load->view('Psicologos/create', $data);
	}

	public function add(){
		$this->load->model('PsicologosModel');
		$dados = $this->get();
		$success = "<div class='ls-sm-space ls-txt-center ls-color-success' style='font-size:20px;'><strong>Sucesso!</strong> agora entre no sistema </div>";
		$this->PsicologosModel->add($dados);
		$this->session->set_flashdata('success',$success);
		redirect('login');
	}
	public function delete($id=NULL){
		if($id == NULL){
			redirect('view-psycho');
		}
		$this->load->model('PsicologosModel');
		$this->PsicologosModel->delete($id);
		redirect('view-psycho');
	}

	public function edit($id){
		$user['nomepsicologo'] = $this->session->userdata('nomepsicologo');
		$this->load->model('PsicologosModel', 'psicologos');
		$dados['psicologos'] = $this->psicologos->view_id($id);
		$this->load->view('Home/menu',$user);
		$this->load->view('Psicologos/update', $dados);
	}

	public function update(){
		$this->load->model('PsicologosModel');
		$this->PsicologosModel->idpsicologo = $this->input->post('idpsicologo');
		$dados = $this->get();
		$this->PsicologosModel->update($dados);
		redirect('view-psycho');
	}

}
