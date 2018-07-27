<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SecretariasController extends CI_Controller 
{
	public $secretaria;

	public function __construct()
	{
		parent::__construct();
		$this->secretaria = $this->session->userdata('usuario');
	}

}
