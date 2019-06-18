<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClinicaSecretaria extends CI_Controller 
{
	public $usr;

	public function __construct()
	{
		parent::__construct();
		$this->usr = $this->session->userdata('usuario');
		$this->load->view('Home/menu');
		$this->load->model('ClinicasModel',"clinicas");
        $this->load->model('PacientesModel',"pacientes");
        $this->load->model('ClinicaSecretariaModel', 'clinicasecretaria');
		if ($this->usr == NULL) 
		{
			redirect('/');
		}

    }
    
    public function index($id)
    {
		$dados = array(
			'clinicas_disponiveis' => $this->clinicasecretaria->clinicasEspecificas($id, $this->usr[0]['id']),
			'secretaria' => $id
		);
		
        $this->load->view('ClinicaSecretaria/index',$dados);
	}

	public function add()
	{
		$dados = $this->input->post();
		$pacote = array();
		
		for($i=0; $i < sizeof($this->input->post('clinica_id')); $i++)
		{
			$pacote['clinica_id'] = $dados['clinica_id'][$i];
			$pacote['secretaria_id'] = $dados['secretaria_id'];
			$this->clinicasecretaria->add($pacote);
		}

			redirect('view-secretaria');
	}

	public function delete($id)
	{
		$this->clinicasecretaria->delete($id);
		redirect('view-secretaria');
	}
}