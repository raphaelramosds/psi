<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuariosController extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('Role');
		$this->load->model('UsuariosModel','usuarios');
		$this->load->model('PsicologosModel','psicologos');
	}

	public function login()
	{
		$data_flash = array(
			'success' 					=> $this->session->flashdata('success'),
			'erro'    					=> $this->session->flashdata('erro_autenticacao'),
			'success_update_password' 	=> $this->session->flashdata('success_update_password'),
			'user_noexists'				=> $this->session->flashdata('user_noexists')
		);

		$this->load->view('Usuarios/login',$data_flash);
  	}

  	//Criar uma sessão para colocar os dados do usuário
	public function auth()
	{
		$user_reg = array(
			'nome'  => $this->input->post('username'),
			'senha' => $this->input->post("senha")
		);

		$senha = md5($user_reg["nome"].$user_reg["senha"]);

		$this->db->where('username', $user_reg["nome"]);
		$this->db->where('senha', $senha);

		$usuario_found = $this->db->get('usuario')->result();

		// Verificar se o usuário existe
		if(count($usuario_found) == 1)
		{
			//Recuperar todos os dados do usuário a partir da sua Role e o seu id
			$request_data = $this->role->identifyUser($usuario_found[0]->role, $usuario_found[0]->id);

			//Verificar se o usuário se atribui à algum Psicologo ou Secretário
			if(count($request_data) == 0)
			{

				$this->usuarios->delete($usuario_found[0]->id);
				$this->session->set_flashdata('user_noexists','O usuário não corresponde a nenhum psicólogo ou secretária. Faça novamente o cadastro');
				redirect('/');
			}
			else if(count($request_data) == 1 )
			{
				$this->session->set_userdata('usuario',$request_data);
				redirect('home');
			}
		}
		else
		{
			$this->session->set_flashdata('erro_autenticacao', 'Usuário ou senha incorretos');
			redirect('login');
		}
  	}

	public function get()
	{
		return array(
			'id' => $this->input->post('id'),
			'username' 	=> $this->input->post('username'),
			'senha' 	=> $this->input->post('senha'),
		);
	}

	public function create()
	{
		$data_flash = array(
			'erro_senha'	=> $this->session->flashdata('erro_senha'), 
			'erro_user'		=> $this->session->flashdata('erro_user'),
			'erro_email'    => $this->session->flashdata('erro_email'),
			'erro_crp'      => $this->session->flashdata('erro_crp')
		);

		$this->load->view('Usuarios/create', $data_flash);
	}

	public function add()
	{
	
		$user_reg 			= $this->get();
		$psicologo_reg		= array(
			'crp' 				=> $this->input->post('crp'),
			'datanascimento' 	=> $this->input->post('datanasc'),
			'email' 			=> $this->input->post('email'),
			'nome' 				=> $this->input->post('nome'),
			'sexo' 				=> $this->input->post('sexo'),
			'usuario_idusuario' =>  $this->input->post('idusuario') //Até agora vazio
		);

		//Faça criptografia da senha

		$user_reg['senha']  = md5($user_reg['username'].$user_reg['senha']);

		//Validações

		$users_count 		= count($this->usuarios->duplicate_user($user_reg['username']));
		$email_count		= count($this->usuarios->verify_email($psicologo_reg['email']));
		$crp_count			= count($this->db->query("SELECT * FROM psicologo WHERE crp = '".$psicologo_reg['crp']."'")->result());

		if($users_count == 1)
		{
			$this->session->set_flashdata('erro_user','Nome de usuário já existe no sistema');
			redirect("cadastre");
		}
		
		if($crp_count == 1)
		{
			$this->session->set_flashdata('erro_crp','CRP já existe no sistema');
			redirect("cadastre");
		}

		if($email_count == 1)
		{
			$this->session->set_flashdata('erro_email','Este e-mail já existe no sistema');
			redirect("cadastre");
		}


		if($this->input->post('confirm_senha') != $this->input->post('senha')) 
		{
			$this->session->set_flashdata('erro_senha','Parece que as senhas não são iguais');
			redirect("cadastre");
		}

		$this->usuarios->add($user_reg);

		$query = $this->db->query("SELECT * FROM usuario WHERE username = '".$user_reg['username']."'");
		$find_usuario = $query->result();
		$id = $find_usuario[0]->id;

		//Colocar id do usuário na Foreign Key do psicologo:
		$psicologo_reg['usuario_idusuario'] = $id;

		//Finalmente, insere os dados do psicólogo:
		$this->psicologos->add($psicologo_reg);

		$this->session->set_flashdata('success','Sucesso ao se cadastrar');
		redirect("login");
	}


	//Primeiro: Exibir tela para informar email
	public function forgotPassword()
	{
		$data_flash = array(
			'invalid_email'      => $this->session->flashdata('invalid_email'),
			'success_send_email' => $this->session->flashdata('success_send_email'),
			'erro_send_email'    => $this->session->flashdata('erro_send_email')
		);

		$this->load->view('Usuarios/recovery', $data_flash);
	}

	//Verificar se o email existe
	public function recoveryPass()
	{

		$email   = $this->input->post('email');
		$request = $this->usuarios->verify_email($email);

		if (count($request) == 0)
		{
			$this->session->set_flashdata('invalid_email','Nenhum e-mail foi encontrado');
			redirect('forgot-password');
		}

		$this->send_email($request);
	}

	//Enviar email para o usuário
	public function send_email($object)
	{

		//Gera um código aleatório para trocar a senha e colocar na sessão
		$code = md5(rand());
		$this->session->set_userdata('code_access', $code);


		$usuario_data = $this->usuarios->view_user($object[0]->usuario_idusuario);

		$this->session->set_userdata('usuario_data_confirm',$usuario_data);


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
		$this->email->to($object[0]->email, $object[0]->nome);

		$this->email->subject('Psi - Redefinição de senha');
		$this->email->message($this->load->view('Usuarios/email_template', array('usuario'=>$usuario_data,'code_access'=>$code),TRUE));

		if ($this->email->send())	
		{
			$this->session->set_flashdata('success_send_email','Email enviado com sucesso!');
			redirect('auth-code');
		}
		else
		{
			$this->session->set_flashdata('erro_send_email',$this->email->print_debugger());
			redirect('forgot-password');
		}
	}	
	
	//Abrir tela para confirmação do código
	public function auth_code()
	{
	  $this->load->view('Usuarios/confirm_code', array(
		  'erro_code' => $this->session->flashdata('erro_code')
	  ));
  	}

	public function confirm_code()
	{
		$code_type = $this->input->post('code');
		$code_auth = $this->session->userdata('code_access');
		$usuario   = $this->session->userdata('usuario_data_confirm'); 

		if ($code_type != $code_auth)
		{
			$this->session->set_flashdata('erro_code','Código inválido ou já foi utilizado');
			redirect('auth-code');
		}
		else
		{
			$code_auth = md5(rand());
			$this->edit_password($usuario[0]->id);
		}

	}

	//Abrir tela para mudança de senha:
	public function edit_password($id)
	{
		$this->session->set_userdata('id_user_password',$id);
		$this->load->view('Usuarios/edit_pass', array('erro_senha'=>$this->session->flashdata('erro_senha')));
	}

	public function update_method_password()
	{
		if($this->input->post('senha') != $this->input->post('confirm_senha'))
		{
			$this->session->set_flashdata('erro_senha','As senhas não coincidem!');
			$this->edit_password($this->session->userdata('id_user_password'));
		}
		else
		{
			$id_usuario = $this->session->userdata('id_user_password');

			$this->load->model('UsuariosModel','usuarios');
			//Recuperar nome do usuário para criptografiar a nova senha:
			$usuario = $this->usuarios->view_user($id_usuario);

			$new_password = md5($usuario[0]->username.$this->input->post('senha'));

			$this->usuarios->update_pass($new_password, $id_usuario);
			$this->session->set_flashdata('success_update_password','A senha foi alterada com sucesso!');
			
			//Redirecionar para a tela de login
			redirect('/');
		}
	}
}
