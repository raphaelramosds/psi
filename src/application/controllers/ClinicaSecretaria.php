<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClinicaSecretaria extends CI_Controller 
{
	public $usr;

	public function __construct()
	{
		parent::__construct();
		$this->usr = $this->session->userdata('usuario');
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
        $this->load->view('Home/menu');
        $this->load->view('ClinicaSecretaria/index');
    }
}