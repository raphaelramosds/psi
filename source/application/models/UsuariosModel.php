<?php

class UsuariosModel extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	function add($dados){
		$this->db->insert('usuario',$dados);
	}

	function duplicate_user($name){
		$this->db->where('username',$name);
		$query = $this->db->get('usuario')->result();
		return $query;
	}

}
