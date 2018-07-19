<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PacientesController extends CI_Controller 
{

	public function index()
	{
		//
		$this->load->model("ClinicasModel","clinicas");

		$config = $this->getpagination();
		$this->pagination->initialize($config);

		if ($this->session->userdata('psicologo') == NULL) 
		{
			redirect('/');
		}

		//Se o valor via URL foi informado, $offset vai receber esse valor. Caso não for informado, offset receberá zero
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$psicologo = $this->session->userdata('psicologo');
		$id_psicologo = $psicologo[0]->idpsicologo;

		$this->load->view('Home/menu', array('nomepsicologo'=>$this->session->userdata('nomepsicologo')));
		$this->load->model('PacientesModel');

		$this->load->view('Pacientes/index', array(
			'datapacientes'		=> $this->PacientesModel->view($id_psicologo, $config['per_page'], $offset),
			'delete' 			=> $this->session->flashdata('delete'),
			'pagination' 		=> $this->pagination->create_links(),
			'update_paciente' 	=> $this->session->flashdata('update_paciente'),
			'add_paciente' 		=> $this->session->flashdata('add_paciente'),
			'delete_paciente' 	=> $this->session->flashdata('delete_paciente'),
			//Dados do Model-View Prontuário
			'psicologo' 		=> $id_psicologo,
			//Exibir Clínicas cadastradas pelo psicologo
			'clinicas' 			=> $this->clinicas->view($id_psicologo)
		));
	}

	public function search()
	{
		$paciente = $this->input->post('paciente');
		$psicologo = $this->session->userdata('psicologo');
		$user['nomepsicologo'] = $this->session->userdata('nomepsicologo');

		$this->load->view('Home/menu',$user);
		$this->load->model('PacientesModel','pacientes');

		$data = array(
			'datapacientes'=>$this->pacientes->search($psicologo[0]->idpsicologo, $paciente),
			'delete' => $this->session->flashdata('delete'),
			'pagination' => NULL
		);
		$this->load->view('Pacientes/index', $data);
	}

	public function get()
	{
		return array(
			'cartaosaude' 		=> $this->input->post('cartaosaude'),
			'emailpaciente' 	=> $this->input->post('email'),
			'nomepaciente' 		=> $this->input->post('nomepaciente'),
			'numerosus' 		=> $this->input->post('numerosus'),
			'profissao' 		=> $this->input->post('profissao'),
			'id_psicologo' 		=> $this->input->post('id_psicologo'),
			'sexopaciente' 		=> $this->input->post('sexopaciente'),
			'telefonepaciente' 	=> $this->input->post('telefonepaciente')
		);
	}

	public function create()
	{
		$psicologo = $this->session->userdata('psicologo');

		$this->load->view('Home/menu',array('nomepsicologo'=>$this->session->userdata('nomepsicologo')));
		$this->load->view('Pacientes/create', array('psicologo_id'=>$psicologo[0]->idpsicologo));
	}

	public function add()
	{
		$paciente_reg = $this->get();

		$this->load->model('PacientesModel');
		$this->PacientesModel->add($paciente_reg);
		$this->session->set_flashdata("add_paciente",'Adcionado com sucesso!');

		redirect('view-paciente');
	}

	public function delete($id)
	{
		if ($id != NULL) 
		{
			$this->load->model('PacientesModel','pacientes');
			$this->pacientes->delete($id);
			$this->session->set_flashdata("delete_paciente",'Deletado com sucesso!');

			redirect('view-paciente');
		}
	}

	public function edit($id)
	{
		$this->load->model('PacientesModel','pacientes');
		
		$this->load->view('Home/menu', array('nomepsicologo'=>$this->session->userdata('nomepsicologo')));
		$this->load->view('Pacientes/update', array('pacientes'=>$this->pacientes->view_id($id)));
	}

	public function update()
	{
		$paciente_reg = $this->get();

		$this->load->model('PacientesModel','pacientes');
		$this->pacientes->id = $this->input->post('idpaciente');
		$this->pacientes->update($paciente_reg);
		$this->session->set_flashdata("update_paciente",'Atualizado com sucesso!');
		redirect('view-paciente');
	}

	public function getpagination()
	{
		$this->load->model('PacientesModel','pacientes');
		$psicologo = $this->session->userdata("psicologo");

		$config = array(
			'base_url' 			=> base_url('PacientesController/index'),
			'per_page' 			=> 4,
			'num_links' 		=> 10,
			'uri_segment' 		=> 3,
			'total_rows' 		=> $this->pacientes->count_results($psicologo[0]->idpsicologo),

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
