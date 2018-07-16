<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	//Carregar a tela de login e após autenticar, criar uma sessão para direcionar à tela incial
  public function index(){
		$this->load->view('Usuarios/login', array(
			'success' => $this->session->flashdata('success'),
			'erro' => $this->session->flashdata('erro_autenticacao')
		));
  }

  //Criar uma sessão para colocar os dados do usuário
  public function auth(){
  	$user_reg = array(
      'nome' => $this->input->post('username'),
      'senha' => $this->input->post("senha")
	);

	$senha = md5($user_reg["nome"].$user_reg["senha"]);

	$this->db->where('username', $user_reg["nome"]);
	$this->db->where('senha', $senha);

	$query = $this->db->get('usuario')->result();

	if (count($query) == 1){
		$this->db->select('*');
		$this->db->from('psicologo');
		$this->db->where('psicologo.usuario_idusuario', $query[0]->idusuario);
		$psicologo = $this->db->get()->result();
		$this->session->set_userdata('psicologo',$psicologo);

		redirect('home');
	}
	else{
		$this->session->set_flashdata('erro_autenticacao', 'Usuário ou senha incorretos');
		redirect('login');
	}
  }
}
