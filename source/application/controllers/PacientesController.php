<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PacientesController extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function getpagination(){
		$config = array(
			'base_url' 	=> base_url('PacientesController/index'),
			'per_page' 	=> 4,
			'num_links' => 10,
			'uri_segment' => 3,
			'total_rows' => $this->db->count_all('paciente'),

			'full_tag_open' => "<ul class = 'ls-pagination-filter'>",
			'full_tag_close' => "</ul>",

			'first_link' => FALSE,
			'last_link' => FALSE,

			'first_tag_open' => "<li>",
			'first_tag_close' => "</li>",

			'prev_link' => "Anterior",

			'prev_tag_open'=>"<li>",
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

	public function index(){
		$config = $this->getpagination();
		$this->pagination->initialize($config);

		if ($this->session->userdata('crp') == NULL) {
			redirect('/');
		}

		//Se o valor via URL foi informado, $offset vai receber esse valor. Caso não for informado, offset receberá zero
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$psicologo = $this->session->userdata('crp');
		$user['nomeusuario'] = $this->session->userdata('nomeusuario');
		$this->load->view('Home/menu',$user);
		$this->load->model('PacientesModel');
		//Ver apenas os seus pacientes...
		$data = array(
			//view($crp, $limit, $offset)
			'datapacientes'=>$this->PacientesModel->view($psicologo[0]->crp, $config['per_page'], $offset),
			'delete' => $this->session->flashdata('delete'),
			'pagination' => $this->pagination->create_links()

		);
		$this->load->view('Pacientes/index', $data);
	}

	public function search(){
		$paciente = $this->input->post('paciente');
		$psicologo = $this->session->userdata('crp');
		$user['nomeusuario'] = $this->session->userdata('nomeusuario');

		$this->load->view('Home/menu',$user);
		$this->load->model('PacientesModel','pacientes');

		$data = array(
			'datapacientes'=>$this->pacientes->search($psicologo[0]->crp, $paciente),
			'delete' => $this->session->flashdata('delete'),
			'pagination' => NULL
		);
		$this->load->view('Pacientes/index', $data);
	}

	public function get(){
		$dados = array(
			'cartaosaude' => $this->input->post('cartaosaude'),
			'emailpaciente' => $this->input->post('email'),
			'nomepaciente' => $this->input->post('nomepaciente'),
			'numerosus' => $this->input->post('numerosus'),
			'profissao' => $this->input->post('profissao'),
			'psicologo_crp' =>  $this->input->post('psicologo_crp'),
			'sexopaciente' =>  $this->input->post('sexopaciente'),
			'telefonepaciente' => $this->input->post('telefonepaciente')
		);
		return $dados;
	}

	public function create(){
		$psicologo = $this->session->userdata('crp');
		$dados['crp'] = $psicologo[0]->crp;
		$user['nomeusuario'] = $this->session->userdata('nomeusuario');
		$this->load->view('Home/menu',$user);
		$this->load->view('Pacientes/create', $dados);
	}

	public function add(){
		$this->load->model('PacientesModel');
		$dados = $this->get();
		$this->PacientesModel->add($dados);
		redirect('PacientesController');
	}

	public function delete($id){
		if ($id != NULL) {
			$this->load->model('PacientesModel');
			$this->PacientesModel->delete($id);
			$this->session->set_flashdata('delete','Paciente deletado com sucesso!');
			redirect('pacientescontroller');
		}
	}

	public function edit($id){
		$user['nomeusuario'] = $this->session->userdata('nomeusuario');
		$this->load->model('PacientesModel');
		$dados['pacientes'] = $this->PacientesModel->receberId($id);
		$this->load->view('Home/menu',$user);
		$this->load->view('Pacientes/update', $dados);
	}

	public function update(){
		$this->load->model('PacientesModel','pacientes');
		$this->pacientes->id = $this->input->post('idpaciente');
		$dados = $this->get();
		$this->pacientes->update($dados);
		redirect('PacientesController');
	}

}
