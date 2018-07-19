<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClinicasController extends CI_Controller 
{
	
	public function index()
	{
		$config = $this->getpagination();
		$this->pagination->initialize($config);
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		if ($this->session->userdata('psicologo') == NULL) 
		{
			redirect('/');
		}

		$psicologo = $this->session->userdata('psicologo');
		
		$this->load->view('Home/menu',array('nomepsicologo'=>$this->session->userdata('nomepsicologo')));
		$this->load->model('ClinicasModel','clinicas');

		$this->load->view('Clinicas/index', array(
			'dataclinica'	 => $this->clinicas->view($psicologo[0]->idpsicologo, $config['per_page'],$offset),
			'pagination' 	 => $this->pagination->create_links(),
			"add_clinica"    => $this->session->flashdata('add_clinica'),
			"update_clinica" => $this->session->flashdata('update_clinica'),
			"delete_clinica" => $this->session->flashdata('delete_clinica') 
		));
	}

	public function search()
	{
		$psicologo = $this->session->userdata('psicologo');
		$nomeclinica = $this->input->post('clinica');

		$this->load->view('Home/menu',array('nomepsicologo'=>$this->session->userdata('nomepsicologo')));
		$this->load->model('ClinicasModel','clinicas');

		$this->load->view('Clinicas/index', array(
			'dataclinica'=> $this->clinicas->search($psicologo[0]->idpsicologo, $nomeclinica),
			'delete'     => $this->session->flashdata('delete')
		));
	}

	public function get()
	{
		return array(
			'nomeclinica' 	=> $this->input->post('nomeclinica'),
			'telefone' 		=> $this->input->post('telefone'),
			'estado' 		=> $this->input->post('estado'),
			'cidade' 		=> $this->input->post('cidade'),
			'id_psicologo' 	=> $this->input->post('id_psicologo')
		);
	}

	public function create()
	{
		$psicologo = $this->session->userdata('psicologo');

		$this->load->view('Home/menu',array('nomepsicologo'=>$this->session->userdata('nomepsicologo')));
		$this->load->view('Clinicas/create',array('psicologo'=>$psicologo[0]->idpsicologo));
	}

	public function add()
	{
		$this->load->model('ClinicasModel');

		$clinica_reg = $this->get();	

		$this->ClinicasModel->add($clinica_reg);
		$this->session->set_flashdata("add_clinica","Adcionada com sucesso!");
		
		redirect('view-clinica');
	}

	public function delete($id)
	{
		if ($id != NULL) 
		{
			$this->load->model('ClinicasModel');
			$this->ClinicasModel->delete($id);
			$this->session->set_flashdata("delete_clinica",'Deletada com sucesso!');

			redirect('view-clinica');
		}
	}

	public function edit($id)
	{
		$this->load->view('Home/menu',array('nomepsicologo'=>$this->session->userdata('nomepsicologo')));
		$this->load->model('ClinicasModel','clinicas');
	
		$this->load->view('Clinicas/update', array('clinicas'=>$this->clinicas->view_id($id)));
	}

	public function update()
	{
		$clinica_reg = $this->get();
		$this->load->model('ClinicasModel','clinicas');
		$this->clinicas->idclinica = $this->input->post('idclinica');
		$this->clinicas->update($clinica_reg);
		$this->session->set_flashdata("update_clinica",'Atualizada com sucesso!');

		redirect('view-clinica');
	}

	public function getpagination()
	{
		$psicologo = $this->session->userdata('psicologo');
		$this->load->model("ClinicasModel","clinicas");

		$config = array(
			'base_url' 			=> base_url('ClinicasController/index'),
			'per_page' 			=> 4,
			'num_links' 		=> 10,
			'uri_segment' 		=> 3,
			'total_rows' 		=> $this->clinicas->count_results($psicologo[0]->idpsicologo),

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
