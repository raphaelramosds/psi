<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuariosController extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index(){
		if ($this->session->userdata('psicologo') == NULL) {
			redirect('/');
		}
		$this->load->view('Home/menu');
		$this->load->model('UsuariosModel');

		$this->load->view('Usuarios/index',array(
			'datausuarios' => $this->UsuariosModel->view()
		));
	}

	public function get(){
		return array(
			'idusuario' => $this->input->post('idusuario'),
			'username' => $this->input->post('username'),
			'senha' => $this->input->post('senha')
		);
	}

	public function create(){
		$this->load->view('Usuarios/create',
		array(
			'erro_senha'=>$this->session->flashdata('erro_senha'), 
			'erro_user'=>$this->session->flashdata('erro_user')
		));
	}

	public function add(){
		$this->load->model('UsuariosModel','usuarios');
		$user_reg = $this->get();

		$user_reg['senha'] = md5($user_reg['username'].$user_reg['senha']);
		$users_count = count($this->usuarios->duplicate_user($user_reg['username']));

		if($users_count == 1){
			$this->session->set_flashdata('erro_user','Nome de usuário já existe');
			redirect("cadastre");
		}

		if ($this->input->post('confirm_senha') != $this->input->post('senha')) {
			$this->session->set_flashdata('erro_senha','Parece que as senhas não são iguais');
			redirect("cadastre");
		}

		$this->usuarios->add($user_reg);

		$this->db->select('idusuario');
		$this->db->where('username',$user_reg['username']);
		$usuario = $this->db->get('usuario')->result();

		//Informa o nome do usuário para a query poder retornar o seu id
		$this->session->set_userdata('id_user', $usuario);
		redirect("create-psycho");
	}
}
