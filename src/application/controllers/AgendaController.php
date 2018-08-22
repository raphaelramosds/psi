<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AgendaController extends CI_Controller 
{
	public $usr;

	public function __construct()
	{
		parent::__construct();
		$this->usr = $this->session->userdata('usuario');
		$this->load->model('ClinicasModel', 'clinicas');
		$this->load->model('SecretariasModel','secretarias');	
		if ($this->usr == NULL) 
		{
			redirect('/');
		}
    }

    public function index()
    {
		$this->load->view('Home/menu', array('nome' => $this->usr[0]['nome']));
    }
    
}
