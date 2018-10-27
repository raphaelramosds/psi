<?php

class PsicologosModel extends CI_Model
{
	
	public $id;

	public function view($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('psicologo');
		return $query->row_array();
	}

	public function view_id($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('psicologo');
		return $query->row();
	}

	public function add($dados)
	{
		$this->db->insert('psicologo', $dados);
	}

	public function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('psicologo');
	}

	public function update($dados)
	{
		$this->db->set($dados);
		$this->db->where('id', $this->id);
		$this->db->update('psicologo');
		//return $dados;
	}

	public function atualizarcodigo($id, $codigo){
		$this->db->set('codigo', $codigo);
		$this->db->where('id', $id);
		$this->db->update('psicologo');
	}

}
