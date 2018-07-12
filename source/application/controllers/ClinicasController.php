<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClinicasController extends CI_Controller {

	function __construct(){
		parent::__construct();
	}
	public function getpagination(){
		$psicologo = $this->session->userdata('psicologo');
		$this->load->model("ClinicasModel","clinicas");

		$config = array(
			'base_url' 	=> base_url('ClinicasController/index'),
			'per_page' 	=> 6,
			'num_links' => 10,
			'uri_segment' => 3,
			'total_rows' => $this->clinicas->count_results($psicologo[0]->idpsicologo),

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

		if ($this->session->userdata('psicologo') == NULL) {
			redirect('/');
		}
		$psicologo = $this->session->userdata('psicologo');
		$user['nomepsicologo'] = $this->session->userdata('nomepsicologo');
		$this->load->view('Home/menu',$user);
		$this->load->model('ClinicasModel');
		$data= array(
			'dataclinica'=>$this->ClinicasModel->view($psicologo[0]->idpsicologo, $config['per_page'],$offset),
			'pagination' => $this->pagination->create_links(),
			"add_clinica" => $this->session->flashdata('add_clinica'),
			"update_clinica" => $this->session->flashdata('update_clinica'),
			"delete_clinica" => $this->session->flashdata('delete_clinica') 
		);
		$this->load->view('Clinicas/index', $data);
	}

	public function search(){
		$psicologo = $this->session->userdata('psicologo');
		$nomeclinica = $this->input->post('clinica');
		$user['nomepsicologo'] = $this->session->userdata('nomepsicologo');

		$this->load->view('Home/menu',$user);
		$this->load->model('ClinicasModel');

		$data= array(
			'dataclinica'=>$this->ClinicasModel->search($psicologo[0]->idpsicologo, $nomeclinica),
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
			'id_psicologo' => $this->input->post('id_psicologo')
		);
		return $dados;
	}

	public function create(){
		$psicologo = $this->session->userdata('psicologo');
		$dados['psicologo'] = $psicologo[0]->idpsicologo;
		$user['nomepsicologo'] = $this->session->userdata('nomepsicologo');
		$this->load->view('Home/menu',$user);
		$this->load->view('Clinicas/create',$dados);
	}

	public function add(){
		$add_clinica = "<div class='ls-background-primary ls-sm-space ls-sm-margin-bottom ls-text-md ls-ico-checkmark'>Adcionado com sucesso! </div>";

		$this->load->model('ClinicasModel');
		$dados = $this->get();	
		$this->ClinicasModel->add($dados);
		$this->session->set_flashdata("add_clinica",$add_clinica);
		redirect('ClinicasController');
	}

	public function delete($id){
		if ($id != NULL) {
			$delete_clinica = "<div class='ls-background-primary ls-sm-space ls-sm-margin-bottom ls-text-md ls-ico-checkmark'>Deletado com sucesso! </div>";
			$this->load->model('ClinicasModel');
			$this->ClinicasModel->delete($id);
			$this->session->set_flashdata("delete_clinica",$delete_clinica);
			redirect('ClinicasController');
		}
	}

	public function edit($id){
		$user['nomepsicologo'] = $this->session->userdata('nomepsicologo');
		$this->load->view('Home/menu',$user);
		$this->load->model('ClinicasModel');
		$dados["clinicas"] =  $this->ClinicasModel->view_id($id);
		$this->load->view('Clinicas/update', $dados);
	}
	public function update(){
		$update_clinica = "<div class='ls-background-primary ls-sm-space ls-sm-margin-bottom ls-text-md ls-ico-checkmark'>Atualizado com sucesso! </div>";
		$dados = $this->get();
		$this->load->model('ClinicasModel','clinicas');
		$this->clinicas->idclinica = $this->input->post('idclinica');
		$this->clinicas->update($dados);
		$this->session->set_flashdata("update_clinica",$update_clinica);
		redirect('ClinicasController');
	}
}
