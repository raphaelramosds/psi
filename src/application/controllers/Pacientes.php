<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pacientes extends CI_Controller 
{
	public $usr;

	public function __construct()
	{
		parent::__construct();
		$this->load->view('Home/menu');
		$this->usr = $this->session->userdata('usuario');
		$this->load->model('PacientesModel','pacientes');
		$this->load->model('ClinicasModel','clinicas');
		if ($this->usr == NULL || $this->usr[1]['role'] == 2) 
		{
			redirect('/');
		}
	}


	public function index()
	{
		//

		$config = $this->getpagination();
		$this->pagination->initialize($config);
		$id = $this->usr[0]['id'];

		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data_pagination_paciente = array(
			'datapacientes'	=> $this->pacientes->view($id, $config['per_page'], $offset),
			'delete' => $this->session->flashdata('delete'),
			'pagination' => $this->pagination->create_links(),
			'update_paciente' => $this->session->flashdata('update_paciente'),
			'add_paciente' => $this->session->flashdata('add_paciente'),
			'delete_paciente' => $this->session->flashdata('delete_paciente'),
			//Dados do Model-View Prontuário
			'psicologo' => $id,
			//Exibir Clínicas cadastradas pelo psicologo
			'clinicas' => $this->clinicas->view($id)
		);

		$this->load->view('Pacientes/index', $data_pagination_paciente);
	}

	public function search()
	{
		$paciente = $this->input->post('paciente');
		$id = $this->usr[0]['id'];

		$data_pacientes_search = array(
			'datapacientes'	=> $this->pacientes->search($this->usr[0]['id'], $paciente),
			'delete' => $this->session->flashdata('delete'),
			'pagination' => NULL,
			//Dados do Model-View Prontuário
			'psicologo' => $id,
			//Exibir Clínicas cadastradas pelo psicologo
			'clinicas' => $this->clinicas->view($id)
		);

		$this->load->view('Pacientes/index', $data_pacientes_search);
	}

	public function create()
	{
		$this->load->view('Pacientes/create', array('psicologo_id'=>$this->usr[0]['id']));
	}
	
	public function add()
	{
		$paciente_reg = $this->input->post();

		/* Query para verificar se o email é unico */

		$this->pacientes->add($paciente_reg);
		$this->session->set_flashdata("add_paciente",'Adcionado com sucesso!');

		redirect('view-paciente');
	}

	public function delete()
	{
	 	$id = $this->input->post('paciente');
		$this->pacientes->delete($id);
     	echo json_encode('Excluido com sucesso');
        exit;
	}

	public function edit($id)
	{	
		$this->load->view('Pacientes/update', array('pacientes'=>$this->pacientes->view_id($id)));
	}

	public function update()
	{
		$paciente_reg = $this->input->post();

		$this->pacientes->id = $this->input->post('id');
		$this->pacientes->update($paciente_reg);
		$this->session->set_flashdata("update_paciente",'Atualizado com sucesso!');

		redirect('view-paciente');
	}

	public function getpagination()
	{

		$config = array(
			'base_url' => base_url('Pacientes/index'),
			'per_page' => 8,
			'num_links' => 10,
			'uri_segment' => 3,
			'total_rows' => $this->pacientes->count_results($this->usr[0]['id']),

			'full_tag_open' => "<ul class = 'ls-pagination-filter'>",
			'full_tag_close' => "</ul>",

			'first_link' => FALSE,
			'last_link' => FALSE,

			'first_tag_open' => "<li>",
			'first_tag_close' => "</li>",

			'prev_link' => "Anterior",

			'prev_tag_open'	=> "<li>",
			'prev_tag_close' => "</li>",

			'next_link' => "Proxima",

			'next_tag_open' => "<li>",
			'next_tag_close' => "</li>",

			'last_tag_open' => "<li>",
			'last_tag_close' => "</li>",

			'cur_tag_open' => "<li class = 'ls-active'><a href='#'>",
			'cur_tag_close' => "</a></li>",

			'num_tag_open' => "<li>",
			'num_tag_close' => "</li>"
		);
		return $config;
	}
}
