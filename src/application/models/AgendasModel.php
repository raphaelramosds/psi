<?php 

class AgendasModel extends CI_Model
{
	public $id;

	public function view($id)
	{
		$this->db->from('agenda');
		$this->db->where('psicologo_id',$id);
		return $this->db->get()->result();
	}

	public function viewId($idagenda)
	{
		$this->db->from('agenda');
		$this->db->where('id', $idagenda);
		return $this->db->get()->row();
	}

	public function add($dados)
	{
		$this->db->insert('agenda',$dados);
	}


}