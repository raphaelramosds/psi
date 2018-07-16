<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PsicologosController extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index(){
		if ($this->session->userdata('psicologo') == NULL) {
			redirect('/');
		}
	
		$psicologo = $this->session->userdata('psicologo');

		//Em cada controlador, chamar a sessão nomepsicologo (userdata)
		//Para recuperar a query no controlador de Home e, assim, retornar o nome do psicólgo
		$this->load->view('Home/menu', array('nomepsicologo'=>$this->session->userdata('nomepsicologo')));

		$this->load->model('PsicologosModel','psicologos');

		$this->load->view('Psicologos/index', array(
			//Enviar o CRP do psicólogo para a cláusula WHERE dentro do Model
			'datapsicologos' => $this->psicologos->view($psicologo[0]->idpsicologo),
		));
	}

	public function get(){
		return array(
			'crp' => $this->input->post('crp'),
			'datanascimento' => $this->input->post('datanasc'),
			'emailpsicologo' => $this->input->post('emailpsicologo'),
			'nomepsicologo' => $this->input->post('nomepsicologo'),
			'sexopsicologo' => $this->input->post('sexopsicologo'),
			'usuario_idusuario' =>  $this->input->post('idusuario'),
		);
	}

	public function create(){
		//Receba o id do usuário que foi enviado do cadastro pela query do model usuário...
		$this->load->view('Psicologos/create', array('id_user'=> $this->session->userdata("id_user")));
	}

	public function add(){
		$id_user = $this->session->userdata("id_user");
		$pycho_reg = $this->get();

		$this->load->model('PsicologosModel','psicologos');

		$this->psicologos->add($pycho_reg);
		$this->session->set_flashdata('success','Sucesso ao se cadastrar');
		
		redirect('login');
	}

	public function delete($id=NULL){
		if($id == NULL){
			redirect('view-psycho');
		}
		$this->load->model('PsicologosModel');
		$this->PsicologosModel->delete($id);

		redirect('view-psycho');
	}

	public function edit($id){
		$this->load->model('PsicologosModel', 'psicologos');

		$this->load->view('Home/menu',array('nomepsicologo'=>$this->session->userdata('nomepsicologo')));
		$this->load->view('Psicologos/update', array('psicologos'=>$this->psicologos->view_id($id)));
	}

	public function update(){
		$psycho_reg = $this->get();

		$this->load->model('PsicologosModel','psicologos');
		$this->psicologos->idpsicologo = $this->input->post('idpsicologo');
		$this->PsicologosModel->update($psycho_reg);
		
		redirect('view-psycho');
	}

}
