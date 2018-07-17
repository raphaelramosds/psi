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
			'erro' => $this->session->flashdata('erro_autenticacao'),
			'success_update_password' => $this->session->flashdata('success_update_password')
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

  public function auth_code(){
	  $this->load->view('Usuarios/confirm_code', array(
		  'erro_code' => $this->session->flashdata('erro_code')
	  ));
  }

  public function forgotPassword(){
		$this->load->view('Usuarios/recovery', array(
			'invalid_email'=>$this->session->flashdata('invalid_email'),
			'success_send_email' => $this->session->flashdata('success_send_email'),
			'erro_send_email' => $this->session->flashdata('erro_send_email')
		));
  }

  
  public function recoveryPass(){
		$this->load->model('UsuariosModel','usuarios');
		$email = $this->input->post('email');

		$request = $this->usuarios->verify_email($email);

		if (count($request) == 0){
			$this->session->set_flashdata('invalid_email','Nenhum e-mail foi encontrado');
			redirect('forgot-password');
		}

		$this->send_email($request);
	}

	public function send_email($object){
		$this->load->model('UsuariosModel','usuarios');

		//Gera um código aleatório para trocar a senha e colocar na sessão
		$code = md5(rand());
		$this->session->set_userdata('code_access', $code);


		$usuario_data = $this->usuarios->view_user($object[0]->usuario_idusuario);

		$this->session->set_userdata('usuario_data_confirm',$usuario_data);

		$base_url = base_url('UsuariosController/edit_password/'.$usuario[0]->idusuario);

		$this->load->library("email");

		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => '465',
			'smtp_user' => 'psi.enterpriseweb@gmail.com',
			'smtp_pass' => 'adminpsi',
			'mailtype' => 'html',
			'charset' => 'utf-8'
		);
		
		
		$this->email->initialize($config);
		$this->email->set_mailtype("html");
		$this->email->set_newline("\r\n");

		$this->email->from('naoresponder@email.com','Sistema de Prontuários de Psicologia');
		$this->email->to($object[0]->emailpsicologo, $object[0]->nomepsicologo);

		$this->email->subject('Psi - Redefinição de senha');
		$this->email->message($this->load->view('Usuarios/email_template', array('usuario'=>$usuario_data,'code_access'=>$code),TRUE));

		if ($this->email->send()){
			$this->session->set_flashdata('success_send_email','Email enviado com sucesso!');
			redirect('LoginController/auth_code');
		}
		else{
			$this->session->set_flashdata('erro_send_email',$this->email->print_debugger());
			redirect('forgot-password');
		}
	}
}

