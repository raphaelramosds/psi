<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller 
{

	public function index()
	{
		if ($this->session->userdata('psicologo') == NULL) {
			redirect('/');
		}
		$this->load->model('ClinicasModel',"clinicas");
		$this->load->model('PacientesModel',"pacientes");

		//Recuperar nome do psicólogo
		$user = $this->session->userdata('psicologo');
		$this->session->set_userdata('nomepsicologo', $user[0]->nomepsicologo);

		$psicologo = $this->session->userdata('psicologo');
		$idpsicologo = $psicologo[0]->idpsicologo;

		$this->load->view('Home/menu', array('nomepsicologo'=>$this->session->userdata('nomepsicologo')));
		$this->load->view('Home/index', array(
			'countersclinica' => $this->clinicas->count_results($psicologo[0]->idpsicologo),
			'counterpaciente' => $this->pacientes->count_results($psicologo[0]->idpsicologo),
			'titulo' 		  => 'Início',
		));
	}

	public function loggout()
	{
		$this->session->unset_userdata('psicologo');
		$this->session->unset_userdata('nomepsicologo');
		redirect('/');
	}

}
