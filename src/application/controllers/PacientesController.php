<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PacientesController extends CI_Controller 
{
	public $usr;

	public function __construct()
	{
		parent::__construct();
		$this->usr = $this->session->userdata('usuario');
		$this->load->model('PacientesModel','pacientes');
		$this->load->model('ClinicasModel','clinicas');
	}


	public function index()
	{
		//

		$config = $this->getpagination();
		$this->pagination->initialize($config);

		if ($this->usr == NULL) 
		{
			redirect('/');
		}

		//Se o valor via URL foi informado, $offset vai receber esse valor. Caso não for informado, offset receberá zero
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;


		$id = $this->usr[0]->id;

		$this->load->view('Home/menupsicologo', array('nome'=>$this->usr[0]->nome));

		$this->load->view('Pacientes/index', array(
			'datapacientes'		=> $this->pacientes->view($id, $config['per_page'], $offset),
			'delete' 			=> $this->session->flashdata('delete'),
			'pagination' 		=> $this->pagination->create_links(),
			'update_paciente' 	=> $this->session->flashdata('update_paciente'),
			'add_paciente' 		=> $this->session->flashdata('add_paciente'),
			'delete_paciente' 	=> $this->session->flashdata('delete_paciente'),
			//Dados do Model-View Prontuário
			'psicologo' 		=> $id,
			//Exibir Clínicas cadastradas pelo psicologo
			'clinicas' 			=> $this->clinicas->view($id)
		));
	}

	public function search()
	{
		$paciente = $this->input->post('paciente');
		$user['nome'] = $this->usr[0]->nome;

		$this->load->view('Home/menupsicologo',$user);

		$data = array(
			'datapacientes'	=> $this->pacientes->search($this->usr[0]->id, $paciente),
			'delete' 		=> $this->session->flashdata('delete'),
			'pagination' 	=> NULL
		);

		$this->load->view('Pacientes/index', $data);
	}

	public function create()
	{
		$this->load->view('Home/menupsicologo',array('nome'=>$this->usr[0]->nome));
		$this->load->view('Pacientes/create', array('psicologo_id'=>$this->usr[0]->id));
	}

	public function add()
	{
		$paciente_reg = $this->input->post();

		$this->pacientes->add($paciente_reg);
		$this->session->set_flashdata("add_paciente",'Adcionado com sucesso!');

		redirect('view-paciente');
	}

	public function delete($id)
	{
		if ($id != NULL) 
		{

			$this->pacientes->delete($id);
			$this->session->set_flashdata("delete_paciente",'Deletado com sucesso!');

			redirect('view-paciente');
		}
	}

	public function edit($id)
	{	
		
		$this->load->view('Home/menupsicologo', array('nome'=>$this->usr[0]->nome));
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
			'base_url' 			=> base_url('PacientesController/index'),
			'per_page' 			=> 4,
			'num_links' 		=> 10,
			'uri_segment' 		=> 3,
			'total_rows' 		=> $this->pacientes->count_results($this->usr[0]->id),

			'full_tag_open' 	=> "<ul class = 'ls-pagination-filter'>",
			'full_tag_close' 	=> "</ul>",

			'first_link' 		=> FALSE,
			'last_link' 		=> FALSE,

			'first_tag_open' 	=> "<li>",
			'first_tag_close' 	=> "</li>",

			'prev_link' 		=> "Anterior",

			'prev_tag_open'		=> "<li>",
			'prev_tag_close' 	=> "</li>",

			'next_link' 		=> "Proxima",

			'next_tag_open' 	=> "<li>",
			'next_tag_close'	=> "</li>",

			'last_tag_open' 	=> "<li>",
			'last_tag_close'    => "</li>",

			'cur_tag_open' 		=> "<li class = 'ls-active'><a href='#'>",
			'cur_tag_close' 	=> "</a></li>",

			'num_tag_open' 		=> "<li>",
			'num_tag_close' 	=> "</li>"
		);
		return $config;
	}
}
