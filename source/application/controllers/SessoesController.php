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
		redirect('view-sessao');

	}

	public function view(){
		$prontuario = $this->session->userdata('prontuario');

		$user['nomepsicologo'] = $this->session->userdata('nomepsicologo');
		$this->load->view('Home/menu',$user);
		$this->load->model('SessoesModel');
		$data = array(
			'datasessoes' => $this->SessoesModel->view($prontuario),
			'update_sessao' => $this->session->flashdata('update_sessao'),
			'add_sessao' => $this->session->flashdata('add_sessao'),
			'delete_sessao' => $this->session->flashdata('delete_sessao')
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
		$dados = $this->get();
		$add_sessao ="<div class='ls-background-primary ls-sm-space ls-sm-margin-bottom ls-text-md ls-ico-checkmark'>Adcionado com sucesso! </div>";
		$this->load->model('SessoesModel');
		$this->SessoesModel->add($dados);
		$this->session->set_flashdata("add_sessao",$add_sessao);
		redirect("view-sessao");
	}
	public function delete($id){
		$delete_sessao = "<div class='ls-background-primary ls-sm-space ls-sm-margin-bottom ls-text-md ls-ico-checkmark'>Deletado com sucesso! </div>";
		$this->load->model('SessoesModel');
		$this->SessoesModel->delete($id);

		$this->session->set_flashdata("delete_sessao",$delete_sessao);
		redirect('view-sessao');
	}

	public function edit($id){
		$user['nomepsicologo'] = $this->session->userdata('nomepsicologo');
		$this->load->model('SessoesModel', 'sessoes');
		$dados['sessao'] = $this->sessoes->view_id($id);
		$this->load->view('Home/menu',$user);
		$this->load->view('Sessoes/update', $dados);
	}

	public function update(){
		$update_sessao = "<div class='ls-background-primary ls-sm-space ls-sm-margin-bottom ls-text-md ls-ico-checkmark'>Atualizado com sucesso! </div>";
		$this->load->model('SessoesModel','sessoes');
		$this->sessoes->idsessao = $this->input->post('idsessao');
		$dados = $this->get();
		$this->sessoes->update($dados);
		$this->session->set_flashdata("update_sessao",$update_sessao);
		redirect('view-sessao');
	}

}
