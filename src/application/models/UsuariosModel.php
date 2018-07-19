<?php

class UsuariosModel extends CI_Model
{

	function add($dados)
	{
		$this->db->insert('usuario',$dados);
	}

	function duplicate_user($name)
	{
		$this->db->where('username',$name);
		$query = $this->db->get('usuario')->result();
		return $query;
	}

	function verify_email($email)
	{
		$this->db->where('emailpsicologo',$email);
		$query = $this->db->get('psicologo')->result();
		
		return $query;
	}

	function delete($id)
	{
		$this->db->where('idusuario',$id);
		$this->db->delete('usuario');
	}

	function view_user($id_usuario)
	{
		//Retornar todo o usuário através do fk_id no Psicólogo
		$this->db->where('idusuario',$id_usuario);
		$query = $this->db->get('usuario')->result();

		return $query;
	}
	
	function update_pass($new_pass, $id_usuario)
	{
		$this->db->set('senha',$new_pass);
		$this->db->where('idusuario', $id_usuario);
		$this->db->update('usuario');
	}
}
