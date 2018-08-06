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
		$this->load->library('Role');	
    }

    public function index()
    {
    	$request_view = $this->role->menuView($this->usr[0]->usuario_idusuario);

		$this->load->view($request_view['menu'], array('nome' => $this->usr[0]->nome));


    }
    
}
