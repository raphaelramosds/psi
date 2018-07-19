<?php

class PsicologosModel extends CI_Model
{
	
	public $idpsicologo;

	public function view($id)
	{
		$this->db->where('idpsicologo', $id);
		$query = $this->db->get('psicologo');
		return $query->result();
	}

	public function view_id($id)
	{
		$this->db->where('idpsicologo',$id);
		$query = $this->db->get('psicologo');
		return $query->row();
	}

	public function add($dados)
	{
		$this->db->insert('psicologo', $dados);
	}

	public function delete($id)
	{
		$this->db->where('idpsicologo',$id);
		$this->db->delete('psicologo');
	}

	public function update($dados)
	{
		$this->db->set($dados);
		$this->db->where('idpsicologo', $this->idpsicologo);
		$this->db->update('psicologo');
	}

}
