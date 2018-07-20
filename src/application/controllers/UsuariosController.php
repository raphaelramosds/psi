<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuariosController extends CI_Controller 
{
	//Carregar a tela de login e após autenticar, criar uma sessão para direcionar à tela incial
	public function login()
	{
		$this->load->view('Usuarios/login', array(
			'success' 					=> $this->session->flashdata('success'),
			'erro'    					=> $this->session->flashdata('erro_autenticacao'),
			'success_update_password' 	=> $this->session->flashdata('success_update_password'),
			'user_noexists'				=> $this->session->flashdata('user_noexists')
		));
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

		$usuario_found = $this->db->get('usuario')->result_array();

		if(count($usuario_found) == 1)
		{
			$this->db->select('*');
			$this->db->from('psicologo');
			$this->db->where('psicologo.usuario_idusuario', $usuario_found[0]['idusuario']);

			$psicologo_found = $this->db->get()->result();

			if(count($psicologo_found) == 0)
			{
				$this->load->model('UsuariosModel','usuarios');
				$this->usuarios->delete($usuario_found[0]['idusuario']);

				$this->session->set_flashdata('user_noexists','O usuário não corresponde a nenhum psicólogo. Faça novamente o cadastro');
				redirect('/');
			}
			else if(count($psicologo_found) == 1 )
			{
				$this->session->set_userdata('psicologo',$psicologo_found);
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
			'idusuario' => $this->input->post('idusuario'),
			'username' 	=> $this->input->post('username'),
			'senha' 	=> $this->input->post('senha')
		);
	}

	public function create()
	{
		$this->load->view('Usuarios/create',
		array(
			'erro_senha'	=> $this->session->flashdata('erro_senha'), 
			'erro_user'		=> $this->session->flashdata('erro_user')
		));
	}

	public function add()
	{
		$this->load->model('UsuariosModel','usuarios');
		
		$user_reg 			= $this->get();
		$user_reg['senha']  = md5($user_reg['username'].$user_reg['senha']);
		$users_count 		= count($this->usuarios->duplicate_user($user_reg['username']));

		if($users_count == 1)
		{
			$this->session->set_flashdata('erro_user','Nome de usuário já existe');
			redirect("cadastre");
		}

		if ($this->input->post('confirm_senha') != $this->input->post('senha')) 
		{
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


	//Primeiro: Exibir tela para informar email
	public function forgotPassword()
	{
		$this->load->view('Usuarios/recovery', array(
			'invalid_email'      => $this->session->flashdata('invalid_email'),
			'success_send_email' => $this->session->flashdata('success_send_email'),
			'erro_send_email'    => $this->session->flashdata('erro_send_email')
		));
	}

	//Verificar se o email existe
	public function recoveryPass()
	{
		$this->load->model('UsuariosModel','usuarios');
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
		$this->load->model('UsuariosModel','usuarios');

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
		$this->email->to($object[0]->emailpsicologo, $object[0]->nomepsicologo);

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
			$this->edit_password($usuario[0]->idusuario);
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
