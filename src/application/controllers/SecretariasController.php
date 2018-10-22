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
		$data_secretaria = $this->secretarias->view($this->usr[0]['id']);

		$this->load->view('Home/menu');
		$this->load->view('Secretarias/index', array('data_secretaria' => $data_secretaria));

	}


	public function edit($id)
	{
		// Selecionar id do usuário relacionado à Secretária
		$q = $this->secretarias->view_user_by_secretaria($id);

		$data_update = array(
			'secretaria' 	=> $this->secretarias->view_id($id),
			'usuario'		=> $this->usuarios->view_user($q->id)
		);

		$this->load->view('Home/menu');
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
		$q = $this->secretarias->view_user_by_secretaria($id);

		$this->secretarias->delete($id);
		$this->usuarios->delete($q->id);
		redirect('view-secretaria');
	}
}
