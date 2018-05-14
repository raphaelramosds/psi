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
			'erro' => $this->session->userdata('erro_autenticacao')
		);
		$this->load->view('Usuarios/login', $flash);
  }

  //Criar uma sessão para colocar os dados do usuário
  public function auth(){
    $data = array(
      'nome' => $this->input->post('username'),
      'senha' => $this->input->post('senha')
    );
		$this->db->where('username', $data["nome"]);
		$this->db->where('senha', $data["senha"]);

		$query = $this->db->get('usuario')->result();

		//Caso autentique, recupere o CRP do psicólogo pelo ID do usuário e crie uma sessão
		if (count($query) == 1) {
			$this->db->select('crp, idpsicologo');
			$this->db->from('psicologo, usuario');
			$this->db->where('psicologo.usuario_idusuario = usuario.idusuario');
			$this->db->where('usuario_idusuario', $query[0]->idusuario);
			$crp = $this->db->get()->result();
			$this->session->set_userdata('crp',$crp);
			redirect('HomeController');
		}
		else{
			$div_erro = "<div class='ls-alert-danger'><strong>Ops!</strong> Usuário ou senha incorretos!</div>";
			$this->session->set_flashdata('erro_autenticacao', $div_erro);
			redirect('LoginController');
		}
  }

}
