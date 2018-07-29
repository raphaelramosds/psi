<?php 

class SecretariasModel extends CI_Model
{
	
	public $id;

	public function add($dados)
	{
		$this->db->insert('secretaria',$dados);
	}

	public function update($dados)
	{ 
		$this->db->set($dados);
		$this->db->where('id', $id);	
		$this->db->update('secretaria');
	}

	public function view($id)
	{
		$this->db->from('secretaria');
		$this->db->where('secretaria.psicologo_id', $id);
		return $this->db->get()->result();
	}

	
	public function view_id($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('secretaria');
		return $query->row();
	}


}