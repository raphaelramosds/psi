<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SessoesController extends CI_Controller 
{
	public $usr;

	public function __construct()
	{
		parent::__construct();
		$this->usr = $this->session->userdata('usuario');
		$this->load->model('SessoesModel','sessoes');
		if ($this->usr == NULL || $this->usr[1]['role'] == 2) 
		{
			redirect('/');
		}
	}

	public function index($numero_prontuario)
	{
		$this->session->set_userdata('prontuario', $numero_prontuario);
		redirect('view-sessao');
	}

	public function search()
	{
		$prontuario = $this->session->userdata('prontuario');
		list($ano, $mes) = explode('-', $this->input->post('mes'));

		$data_flash = array(
			'datasessoes' 	=> $this->sessoes->search($prontuario, $mes, $ano)
		);

		$this->load->view('Home/menu');
		$this->load->view('Sessoes/index', $data_flash);
	}

	public function view()
	{
		$prontuario = $this->session->userdata('prontuario');
		$data_flash = array(
			'datasessoes' 	=> $this->sessoes->view($prontuario),
			'update_sessao' => $this->session->flashdata('update_sessao'),
			'add_sessao' 	=> $this->session->flashdata('add_sessao'),
			'delete_sessao' => $this->session->flashdata('delete_sessao')
		);

		$this->load->view('Home/menu');
		$this->load->view('Sessoes/index', $data_flash);
	}

	public function create()
	{
		$this->load->view('Home/menu');
		$this->load->view('Sessoes/create', array('prontuario' => $this->session->userdata('prontuario')));
	}

	public function add()
	{
		$ses_reg = $this->input->post();

		$this->sessoes->add($ses_reg);
		$this->session->set_flashdata("add_sessao",'Adcionada com sucesso!');
		redirect("view-sessao");
	}

	public function delete($id)
	{
		$this->sessoes->delete($id);

		$this->session->set_flashdata("delete_sessao","Deletada com sucesso!");
		
		redirect('view-sessao');
	}

	public function edit($id)
	{

		$this->load->view('Home/menu');
		$this->load->view('Sessoes/update', array('sessao'=>$this->sessoes->view_id($id)));
	}

	public function update()
	{
		
		$ses_reg = $this->input->post();

		$this->sessoes->id = $this->input->post('id');

		$this->sessoes->update($ses_reg);
		$this->session->set_flashdata("update_sessao",'Atualizada com sucesso!');

		redirect('view-sessao');
	}

}
