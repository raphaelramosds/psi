<?php

class UsuariosModel extends CI_Model
{

	public function identifyUser($role, $id_user)
    {
        if ($role == 1) 
        {
            $this->db->where('psicologo.usuario_idusuario', $id_user);
            $request = $this->db->get('psicologo')->row_array();
            return $request;
        }
        else if ($role == 2) 
        {
            $this->db->where('secretaria.usuario_idusuario', $id_user);
            $request = $this->db->get('secretaria')->row_array();
            return $request;
        }
    }

	function add($dados)
	{
		$this->db->insert($this->db->dbprefix('usuario'),$dados);
	}

	function duplicate_user($name)
	{
		$this->db->where('username',$name);
		$query = $this->db->get($this->db->dbprefix('usuario'))->result();
		return $query;
	}

	function verify_email($email)
	{
		$this->db->where('email',$email);
		$query = $this->db->get($this->db->dbprefix('usuario'))->result();
		
		return $query;
	}

	function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete($this->db->dbprefix('usuario'));
	}

	function view_user($id_usuario)
	{
		$this->db->where('id',$id_usuario);
		$query = $this->db->get($this->db->dbprefix('usuario'))->result();

		return $query;
	}
	
	function update($dados)
	{
		$this->db->where('id', $this->id);
		$this->db->set($dados);
		$this->db->update($this->db->dbprefix('usuario'));
	}

	function update_pass($new_pass, $id_usuario)
	{
		$this->db->set('senha',$new_pass);
		$this->db->where('id', $id_usuario);
		$this->db->update($this->db->dbprefix('usuario'));
	}
}
