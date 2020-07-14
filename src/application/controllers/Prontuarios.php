<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prontuarios extends CI_Controller 
{
	public $usr;

	public function __construct()
	{
		parent::__construct();
		$this->load->view('Home/menu');
		$this->usr = $this->session->userdata('usuario');
		$this->load->model('ProntuariosModel','prontuarios');
		$this->load->model('ClinicasModel','clinicas');
		$this->load->model('PacientesModel','pacientes');
		if ($this->usr == NULL || $this->usr[1]['role'] == 2) 
		{
			redirect('/');
		}
	}

	public function index($idpaciente)
	{
		$this->session->set_userdata('paciente', $idpaciente);
		redirect('view-prontuario');
	}

	public function view()
	{
		$id = $this->usr[0]['id'];

		$paciente = $this->session->userdata('paciente');
		$data_flash_inf = array(
			'dataprontuarios' => $this->prontuarios->view($id, $paciente),
			'delete' => $this->session->flashdata('delete'),
			'clinicas' => $this->clinicas->view($id),
			'psicologo'=> $id,
			'add_prontuario' => $this->session->flashdata('add_prontuario'),
			'delete_prontuario' => $this->session->flashdata('delete_prontuario'),
			'update_prontuario' => $this->session->flashdata('update_prontuario'),
		); 

		$this->load->view('Prontuarios/index', $data_flash_inf);
	}

	public function search()
	{

		list($ano, $mes) = explode("-", $this->input->post('mes'));
		$id = $this->usr[0]['id'];

		$paciente = $this->session->userdata('paciente');

		$pesquisa = array(
			'dataprontuarios' => $this->prontuarios->search($id, $mes, $ano, $paciente), 
			'clinicas' => $this->clinicas->view($id),
			'psicologo' => $id
		);

		$this->load->view('Prontuarios/index', $pesquisa);
	}


	public function add()
	{

		$prontuario_reg = $this->input->post();
		$prontuario_reg['cid10'] = strtoupper($prontuario_reg['cid10']);

		$this->prontuarios->add($prontuario_reg);

		$this->session->set_flashdata("add_prontuario",'Adcionado com sucesso!');
		$this->index($prontuario_reg['paciente_id']);

	}

	public function delete()
	{
		$idprontuario = $this->input->post('prontuario');
		$this->prontuarios->delete($idprontuario);
		echo json_encode('Excluido com sucesso');
        exit;
	}

	public function edit($id){
		$id_psicologo = $this->usr[0]['id'];

		$data_prontuarios = array(
			'prontuarios' => $this->prontuarios->view_id($id),
			'clinicas' => $this->clinicas->view($id_psicologo),
			'pacientes' => $this->pacientes->view($id_psicologo)
		);

		$this->load->view('Prontuarios/update', $data_prontuarios);
	}

	public function update()
	{

		$prontuario_reg = $this->input->post();	
		$prontuario_reg['cid10'] = strtoupper($prontuario_reg['cid10']);

		$this->prontuarios->numeroprontuario = $this->input->post('numeroprontuario');
		$this->prontuarios->update($prontuario_reg);
		$this->session->set_flashdata("update_prontuario",'Atualizado com sucesso');
		redirect('view-prontuario');
	}


}
