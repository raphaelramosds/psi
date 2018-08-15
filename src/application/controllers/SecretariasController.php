<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SecretariasController extends CI_Controller 
{
	public $usr;

	public function __construct()
	{
		parent::__construct();
		$this->usr = $this->session->userdata('usuario');
		$this->load->model('ClinicasModel', 'clinicas');
		$this->load->model('SecretariasModel','secretarias');
		$this->load->model('UsuariosModel','usuarios');

		if ($this->usr == NULL) 
		{
			redirect('/');
		}
	}

	public function view()
	{	
		$data_secretaria = $this->secretarias->view($this->usr[0]->id);

		$this->load->view('Home/menupsicologo', array('nome' => $this->usr[0]->nome));
		$this->load->view('Secretarias/index', array('data_secretaria' => $data_secretaria));

	}

	public function create()
	{
		$data_form_secretaria = array(
			'psicologo_id' 		=> $this->usr[0]->id,
			'clinicas'	   		=> $this->clinicas->view($this->usr[0]->id),
			'erro_senha'		=> $this->session->flashdata('erro_senha'), 
			'erro_user'			=> $this->session->flashdata('erro_user')
		); 

		$this->load->view('Home/menupsicologo', array('nome' => $this->usr[0]->nome));
		$this->load->view('Secretarias/create', $data_form_secretaria);
	}

	public function edit($id)
	{
		$usuario = $this->db->query("SELECT u.id FROM usuario as u INNER JOIN secretaria as e ON (e.usuario_idusuario = u.id)")->row();

		$data_update = array(
			'secretaria' 	=> $this->secretarias->view_id($id),
			'clinicas'	   	=> $this->clinicas->view($this->usr[0]->id),
			'usuario'		=> $this->usuarios->view_user($usuario->id)
		);

		$this->load->view('Home/menupsicologo', array('nome' => $this->usr[0]->nome));
		// Exiba dois opção para dois Formulários: Informações da Secretária e Informações Usuário
		$this->load->view('Secretarias/update', $data_update);
	}

	public function update()
	{
		$secretaria_reg = $this->input->post();
		$this->secretarias->id = $secretaria_reg['id'];
		$this->secretarias->update($secretaria_reg);
		redirect('view-secretaria');
	}

	public function delete($id)
	{
		$this->secretarias->delete($id);
		redirect('view-secretaria');
	}
}
