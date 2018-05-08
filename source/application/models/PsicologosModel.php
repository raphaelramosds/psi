<?php

class PsicologosModel extends CI_Model{
	public $crp;

	function __construct(){
		parent::__construct();
	}

	public function view($crp){
		$this->db->where('crp', $crp);
		$query = $this->db->get('psicologo');
		return $query->result();
	}

	public function receberId($id){
		$this->db->where('crp',$id);
		$query = $this->db->get('psicologo');
		return $query->row();
	}

	public function add($dados){
		$this->db->insert('psicologo', $dados);
	}

	public function delete($id){
		$this->db->where('crp',$id);
		$this->db->delete('psicologo');
	}

	public function update($dados){
		$this->db->set($dados);
		$this->db->where('crp', $this->crp);
		$this->db->update('psicologo');
	}

}
