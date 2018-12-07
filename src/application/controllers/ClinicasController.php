<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClinicasController extends CI_Controller 
{
	public $usr;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ClinicasModel','clinicas');
		$this->usr = $this->session->userdata('usuario');
		if ($this->usr == NULL || $this->usr[1]['role'] == 2) 
		{
			redirect('/');
		}
	}

	public function index()
	{
		$config = $this->getpagination();
		$this->pagination->initialize($config);
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data_clinica_pagination = array(
			'dataclinica'	 => $this->clinicas->view($this->usr[0]['id'], $config['per_page'],$offset),
			'pagination' 	 => $this->pagination->create_links(),
			'add_clinica'    => $this->session->flashdata('add_clinica'),
			'update_clinica' => $this->session->flashdata('update_clinica'),
			'delete_clinica' => $this->session->flashdata('delete_clinica') 
		);

		$this->load->view('Home/menu');
		$this->load->view('Clinicas/index', $data_clinica_pagination);
	}

	public function search()
	{
		$nomeclinica = $this->input->post('nome');

		$this->load->view('Home/menu');
		$this->load->view('Clinicas/index', array(
			'dataclinica' => $this->clinicas->search($this->usr[0]['id'], $nomeclinica),
			'delete' => $this->session->flashdata('delete')
		));
	}

	public function create()
	{

		$this->load->view('Home/menu');
		$this->load->view('Clinicas/create',array('psicologo' => $this->usr[0]['id']));
	}

	public function add()
	{

		$clinica_reg = $this->input->post();	

		$this->clinicas->add($clinica_reg);
		$this->session->set_flashdata("add_clinica","Adcionada com sucesso!");
		
		redirect('view-clinica');
	}

	public function delete($id)
	{
		if ($id != NULL) 
		{
			$this->clinicas->delete($id);
			$this->session->set_flashdata("delete_clinica",'Deletada com sucesso!');

			redirect('view-clinica');
		}
	}

	public function edit($id)
	{
		
		$this->load->view('Home/menu');
		$this->load->view('Clinicas/update', array('clinicas' => $this->clinicas->view_id($id)));
	}

	public function update()
	{
		$clinica_reg = $this->input->post();
		$this->clinicas->id = $this->input->post('id');
		$this->clinicas->update($clinica_reg);
		$this->session->set_flashdata("update_clinica",'Atualizada com sucesso!');

		redirect('view-clinica');
	}

	public function getpagination()
	{
		
		$config = array(
			'base_url' 			=> base_url('ClinicasController/index'),
			'per_page' 			=> 8,
			'num_links' 		=> 10,
			'uri_segment' 		=> 3,
			'total_rows' 		=> $this->clinicas->count_results($this->usr[0]['id']),

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
			'next_tag_close' 	=> "</li>",

			'last_tag_open' 	=> "<li>",
			'last_tag_close' 	=> "</li>",

			'cur_tag_open' 		=> "<li class = 'ls-active'><a href='#'>",
			'cur_tag_close' 	=> "</a></li>",

			'num_tag_open' 		=> "<li>",
			'num_tag_close' 	=> "</li>"
		);
		return $config;
	}
}
