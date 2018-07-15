<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	//Carregar a tela de login e após autenticar, criar uma sessão para direcionar à tela incial
  public function index(){
		$flash = array(
			'success' => $this->session->flashdata('success'),
			'erro' => $this->session->flashdata('erro_autenticacao')
		);
		$this->load->view('Usuarios/login', $flash);
  }

  //Criar uma sessão para colocar os dados do usuário
  public function auth(){
    $data = array(
      'nome' => $this->input->post('username'),
      'senha' => $this->input->post("senha")
	);
	$senha = md5($data["nome"].$data["senha"]);

	$this->db->where('username', $data["nome"]);
	$this->db->where('senha', $senha);

	$query = $this->db->get('usuario')->result();

	if (count($query) == 1) {
		$this->db->select('*');
		$this->db->from('psicologo');
		$this->db->where('psicologo.usuario_idusuario', $query[0]->idusuario);
		$psicologo = $this->db->get()->result();
		$this->session->set_userdata('psicologo',$psicologo);
		redirect('home');
	}
	else{
		$div_erro = "<div class='ls-sm-space ls-txt-center' style='font-size:20px; color:red;'>Usuário ou senha incorretos!</div>";
		$this->session->set_flashdata('erro_autenticacao', $div_erro);
		redirect('login');
	}
  }
}
