<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClinicasController extends CI_Controller {

	function __construct(){
		parent::__construct();
	}
	public function getpagination(){
		$config = array(
			'base_url' 	=> base_url('ClinicasController/index'),
			'per_page' 	=> 4,
			'num_links' => 10,
			'uri_segment' => 3,
			'total_rows' => $this->db->count_all('clinica'),

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
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		if ($this->session->userdata('crp') == NULL) {
			redirect('/');
		}
		$psicologo = $this->session->userdata('crp');
		$user['nomeusuario'] = $this->session->userdata('nomeusuario');
		$this->load->view('Home/menu',$user);
		$this->load->model('ClinicasModel');
		$data= array(
			'dataclinica'=>$this->ClinicasModel->view($psicologo[0]->crp, $config['per_page'],$offset),
			'delete' => $this->session->flashdata('delete'),
			'pagination' => $this->pagination->create_links()
		);
		$this->load->view('Clinicas/index', $data);
	}

	public function search(){
		$psicologo = $this->session->userdata('crp');
		$nomeclinica = $this->input->post('clinica');
		$user['nomeusuario'] = $this->session->userdata('nomeusuario');

		$this->load->view('Home/menu',$user);
		$this->load->model('ClinicasModel');

		$data= array(
			'dataclinica'=>$this->ClinicasModel->search($psicologo[0]->crp, $nomeclinica),
			'delete' => $this->session->flashdata('delete')
		);
		$this->load->view('Clinicas/index', $data);
	}

	public function get(){
		$dados = array(
			'nomeclinica' => $this->input->post('nomeclinica'),
			'telefone' => $this->input->post('telefone'),
			'estado' => $this->input->post('estado'),
			'cidade' => $this->input->post('cidade'),
			'crp_psicologo' => $this->input->post('crp_psicologo')
		);
		return $dados;
	}

	public function create(){
		$psicologo = $this->session->userdata('crp');
		$dados['crp'] = $psicologo[0]->crp;
		$user['nomeusuario'] = $this->session->userdata('nomeusuario');
		$this->load->view('Home/menu',$user);
		$this->load->view('Clinicas/create',$dados);
	}

	public function add(){
		$this->load->model('ClinicasModel');
		$dados = $this->get();
		$this->ClinicasModel->add($dados);
		redirect('ClinicasController');
	}

	public function delete($id){
		if ($id != NULL) {
			$this->load->model('ClinicasModel');
			$this->ClinicasModel->delete($id);
			$this->session->set_flashdata('delete','Sucesso ao deletar a clínica');
			redirect('clinicascontroller');
		}
	}

	public function edit($id){
		$user['nomeusuario'] = $this->session->userdata('nomeusuario');
		$this->load->view('Home/menu',$user);
		$this->load->model('ClinicasModel');
		$dados["clinicas"] =  $this->ClinicasModel->recuperarId($id);
		$this->load->view('Clinicas/update', $dados);
	}
	//Maneira certa de fazer:
	public function update(){
		//Carregar o model
		$this->load->model('ClinicasModel');
		//Receber o ID primário para modificar dentro da class do Model
		$this->ClinicasModel->idclinica = $this->input->post('idclinica');
		//Receber os outros dados dentro de um array e mandar para o SET no model
		$dados = $this->get();
		$this->ClinicasModel->update($dados);
		redirect('clinicascontroller');
	}
}
