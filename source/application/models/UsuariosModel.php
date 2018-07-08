<?php

class UsuariosModel extends CI_Model{

	function __construct(){
		parent::__construct();
	}
	function recuperarId($id){
		$this->db->where('idusuario',$id);
		//Recuperando informação de registro a partir da id
		$query = $this->db->get('usuario');
		return $query->row();
	}
	function view(){
		$query = $this->db->get('usuario');
		return $query->result();
	}
	function add($dados){
		$this->db->insert('usuario',$dados);
	}

	function delete($id){
		$this->db->where('idusuario',$id);
		$this->db->delete('usuario');
	}

	function update($data){
		$this->db->set($data);
		$this->db->where('idusuario', $data['idusuario']);
		$this->db->update('usuario');
	}

}
