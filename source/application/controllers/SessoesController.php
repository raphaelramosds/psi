<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SessoesController extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index($numeroprontuario){
		if ($this->session->userdata('psicologo') == NULL) {
			redirect('/');
		}
		$this->session->set_userdata('prontuario', $numeroprontuario);
		redirect('SessoesController/view');

	}

	public function view(){
		$prontuario = $this->session->userdata('prontuario');

		$user['nomepsicologo'] = $this->session->userdata('nomepsicologo');
		$this->load->view('Home/menu',$user);
		$this->load->model('SessoesModel');
		$data = array(
			'datasessoes' => $this->SessoesModel->view($prontuario)
		);
		$this->load->view('Sessoes/index',$data);
	}

	public function get(){
		$dados = array(
			'data' => $this->input->post('data'),
			'descricao' =>  $this->input->post('descricao'),
			'numero_prontuario' => $this->input->post('numeroprontuario'),	
			'titulo' => $this->input->post('titulo')
		);

		return $dados;
	}

	public function create(){
		$dados['prontuario'] = $this->session->userdata('prontuario');
		$user['nomepsicologo'] = $this->session->userdata('nomepsicologo');
		$this->load->view('Home/menu',$user);
		$this->load->view('Sessoes/create', $dados);
	}

	public function add(){
		$this->load->model('SessoesModel');
		$dados = $this->get();
		$this->SessoesModel->add($dados);
		redirect("SessoesController/view");
	}
	public function delete($id){
		$this->load->model('SessoesModel');
		$this->SessoesModel->delete($id);
		redirect('SessoesController/view');
	}

	public function edit($id){
		$user['nomepsicologo'] = $this->session->userdata('nomepsicologo');
		$this->load->model('SessoesModel', 'sessoes');
		$dados['sessao'] = $this->sessoes->view_id($id);
		$this->load->view('Home/menu',$user);
		$this->load->view('Sessoes/update', $dados);
	}

	public function update(){
		$this->load->model('SessoesModel','sessoes');
		$this->sessoes->idsessao = $this->input->post('idsessao');
		$dados = $this->get();
		$this->sessoes->update($dados);
		redirect('SessoesController/view');
	}

}
