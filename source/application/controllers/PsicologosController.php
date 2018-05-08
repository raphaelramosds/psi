<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PsicologosController extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index(){
		if ($this->session->userdata('crp') == NULL) {
			redirect('/');
		}
		//Recuperar dados do psicólogo através do seu CRP
		$psicologo = $this->session->userdata('crp');

		//Em cada controlador, chamar a sessão nomeusuario (userdata)
		//Para recuperar a query no controlador de Home e, assim, retornar o nome do psicólgo
		$user['nomeusuario'] = $this->session->userdata('nomeusuario');
		$this->load->view('Home/menu', $user);

		$this->load->model('PsicologosModel');
		$data = array(
			//Enviar o CRP do psicólogo para a cláusula WHERE dentro do Model
			'datapsicologos' => $this->PsicologosModel->view($psicologo[0]->crp),
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
		$data["username"] = $this->session->userdata("username");
		$this->load->view('Psicologos/create', $data);
	}

	public function add(){
		$this->load->model('PsicologosModel');
		$dados = $this->get();
		$this->PsicologosModel->add($dados);
		$this->session->set_flashdata('success',"Cadastro realizado com sucesso!");
		redirect('logincontroller');
	}
	public function delete($id=NULL){
		if($id == NULL){
			redirect('psicologoscontroller');
		}
		$this->load->model('PsicologosModel');
		$this->PsicologosModel->delete($id);
		redirect('psicologoscontroller');
	}

	public function edit($id){
		$user['nomeusuario'] = $this->session->userdata('nomeusuario');
		$this->load->model('PsicologosModel', 'psicologos');
		$dados['psicologos'] = $this->psicologos->receberId($id);
		$this->load->view('Home/menu',$user);
		$this->load->view('Psicologos/update', $dados);
	}

	public function update(){
		$this->load->model('PsicologosModel');
		$this->PsicologosModel->crp = $this->input->post('crp');
		$dados = $this->get();
		$this->PsicologosModel->update($dados);
		redirect('psicologoscontroller');
	}

}
