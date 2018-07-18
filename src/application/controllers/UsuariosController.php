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
			'username' 	=> $this->input->post('username'),
			'senha' 	=> $this->input->post('senha')
		);
	}

	public function create(){
		$this->load->view('Usuarios/create',
		array(
			'erro_senha'	=> $this->session->flashdata('erro_senha'), 
			'erro_user'		=> $this->session->flashdata('erro_user')
		));
	}

	public function add(){
		$this->load->model('UsuariosModel','usuarios');
		
		$user_reg 			= $this->get();
		$user_reg['senha']  = md5($user_reg['username'].$user_reg['senha']);
		$users_count 		= count($this->usuarios->duplicate_user($user_reg['username']));

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

	//Primeiro: Ativação do código
	public function confirm_code(){
		$code_type = $this->input->post('code');
		$code_auth = $this->session->userdata('code_access');
		$usuario   = $this->session->userdata('usuario_data_confirm'); 

		if ($code_type != $code_auth){
			$this->session->set_flashdata('erro_code','Código inválido ou já foi utilizado');
			redirect('auth-code');
		}else{
			$code_auth = md5(rand());
			$this->edit_password($usuario[0]->idusuario);
		}

	}


	public function edit_password($id){
		$this->session->set_userdata('id_user_password',$id);
		$this->load->view('Usuarios/edit_pass', array('erro_senha'=>$this->session->flashdata('erro_senha')));
	}

	public function update_method_password(){
		if($this->input->post('senha') != $this->input->post('confirm_senha')){
			$this->session->set_flashdata('erro_senha','As senhas não coincidem!');
			$this->edit_password($this->session->userdata('id_user_password'));
		}
		else{
			$id_usuario = $this->session->userdata('id_user_password');

			$this->load->model('UsuariosModel','usuarios');
			//Recuperar nome do usuário para criptografiar a nova senha:
			$usuario = $this->usuarios->view_user($id_usuario);

			$new_password = md5($usuario[0]->username.$this->input->post('senha'));

			$this->usuarios->update_pass($new_password, $id_usuario);
			$this->session->set_flashdata('success_update_password','A senha foi alterada com sucesso!');
			redirect('/');
		}
	}
}
