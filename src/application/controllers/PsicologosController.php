<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PsicologosController extends CI_Controller 
{
	public $psicologo;

	public function __construct()
	{
		parent::__construct();
		$this->psicologo = $this->session->userdata('psicologo');
	}


	public function index(){
		if ($this->psicologo == NULL) 
		{
			redirect('/');
		}
	
		//Em cada controlador, chamar a sessão nomepsicologo (userdata)
		//Para recuperar a query no controlador de Home e, assim, retornar o nome do psicólgo
		$this->load->view('Home/menu', array('nomepsicologo'=>$this->psicologo[0]->nomepsicologo));

		$this->load->model('PsicologosModel','psicologos');

		$this->load->view('Psicologos/index', array(
			//Enviar o CRP do psicólogo para a cláusula WHERE dentro do Model
			'datapsicologos' => $this->psicologos->view($this->psicologo[0]->idpsicologo),
		));
	}

	public function get()
	{
		return array(
			'crp' 				=> $this->input->post('crp'),
			'datanascimento' 	=> $this->input->post('datanasc'),
			'emailpsicologo' 	=> $this->input->post('emailpsicologo'),
			'nomepsicologo' 	=> $this->input->post('nomepsicologo'),
			'sexopsicologo' 	=> $this->input->post('sexopsicologo'),
			'usuario_idusuario' =>  $this->input->post('idusuario')
		);
	}

	public function delete($id=NULL)
	{
		if($id == NULL)
		{
			redirect('view-psycho');
		}

		$this->load->model('PsicologosModel');
		$this->PsicologosModel->delete($id);

		redirect('view-psycho');
	}

	public function edit($id)
	{

		$this->load->model('PsicologosModel', 'psicologos');

		$this->load->view('Home/menu',array('nomepsicologo'=>$this->psicologo[0]->nomepsicologo));
		$this->load->view('Psicologos/update', array('psicologos'=>$this->psicologos->view_id($id)));
	}

	public function update()
	{
		$psycho_reg = $this->get();

		$this->load->model('PsicologosModel','psicologos');
		$this->psicologos->idpsicologo = $this->input->post('idpsicologo');
		$this->psicologos->update($psycho_reg);
		
		redirect('view-psycho');
	}

}
