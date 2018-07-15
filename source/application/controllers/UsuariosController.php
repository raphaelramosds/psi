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
		$data = array(
			'datausuarios' => $this->UsuariosModel->view()
		);
		$this->load->view('Usuarios/index',$data);
	}
	public function get(){
		$dados = array(
			'idusuario' => $this->input->post('idusuario'),
			'username' => $this->input->post('username'),
			'senha' => $this->input->post('senha')
		);
		return $dados;
	}

	public function create(){
		$this->load->view('Usuarios/create',
		array(
			'erro_senha'=>$this->session->flashdata('erro_senha'), 
			'erro_user'=>$this->session->flashdata('erro_user')
			)
		);
	}

	public function add(){
		$this->load->model('UsuariosModel','usuarios');
		$dadosusuario = $this->get();
		$dadosusuario['senha'] = md5($dadosusuario['username'].$dadosusuario['senha']);
		$users_count = count($this->usuarios->duplicate_user($dadosusuario['username']));

		if($users_count == 1){
			$erro_user = "<div class='ls-sm-space' style='font-size:20px; color:red;'>Nome de usuário já existe</div>";
			$this->session->set_flashdata('erro_user',$erro_user);
			redirect("cadastre");
		}

		if ($this->input->post('confirm_senha') != $this->input->post('senha')) {
			$erro_senha = "<div class='ls-sm-space ls-txt-center' style='font-size:20px; color:red;'>Parece que as senhas não são iguais</div>";
			$this->session->set_flashdata('erro_senha',$erro_senha);
			redirect("cadastre");
		}
		$this->usuarios->add($dadosusuario);

		$this->db->select('idusuario');
		$this->db->where('username',$dadosusuario['username']);
		$usuario = $this->db->get('usuario')->result();

		//Informa o nome do usuário para a query poder retornar o seu id
		$this->session->set_userdata('id_user', $usuario);
		redirect("create-psycho");
	}
}
