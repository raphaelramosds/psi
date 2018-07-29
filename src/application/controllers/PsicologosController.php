<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PsicologosController extends CI_Controller 
{
	public $usr;

	public function __construct()
	{
		parent::__construct();
		$this->usr = $this->session->userdata('usuario');
		$this->load->library('Role');	
		$this->load->model('PsicologosModel','psicologos');
	}


	public function index()
	{
		$request_view = $this->role->menuView($this->usr[0]->usuario_idusuario);

		$this->load->view($request_view['menu'], array('nome' => $this->usr[0]->nome));
		$this->load->view('Psicologos/index', array('datapsicologos' => $this->psicologos->view($this->usr[0]->id)));

	}

	public function delete($id=NULL)
	{
		if($id == NULL)
		{
			redirect('view-psycho');
		}

		$this->psicologos->delete($id);

		redirect('view-psycho');
	}

	public function edit($id)
	{

		$request_view = $this->role->menuView($this->usr[0]->usuario_idusuario);

		$this->load->view($request_view['menu'],array('nome' => $this->usr[0]->nome));
		$this->load->view('Psicologos/update', array('psicologos' => $this->psicologos->view_id($id)));
	}

	public function update()
	{
		$psycho_reg = $this->input->post();

		$this->psicologos->id = $this->input->post('id');
		$this->psicologos->update($psycho_reg);
		
		redirect('view-psycho');
	}

}
