<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClinicasModel extends CI_Model 
{
	
	public $id;

	public function view($id,$limit = NULL, $offset = NULL)
	{

		if ($limit) 
		{
			$this->db->limit($limit, $offset);
		}

		$this->db->from($this->db->dbprefix('psicologo').",".$this->db->dbprefix('clinica'));
		$this->db->where($this->db->dbprefix('psicologo').'.id = '.$this->db->dbprefix('clinica').'.id_psicologo');
		$this->db->where('id_psicologo',$id);
		$this->db->order_by($this->db->dbprefix('clinica').".nome", "asc");
		$query = $this->db->get();
		return $query->result();
	}

	public function search($id, $nomeclinica)
	{
		$this->db->from($this->db->dbprefix('clinica'));
		$this->db->where($this->db->dbprefix('clinica').'.id_psicologo = '.$id);
		$this->db->like($this->db->dbprefix('clinica').'.nome', $nomeclinica);
		return $this->db->get()->result();
	}

	public function add($dados)
	{
		$this->db->insert($this->db->dbprefix('clinica'),$dados);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->db->dbprefix('clinica'));
	}

	public function view_id($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get($this->db->dbprefix('clinica'));
		return $query->row();
	}

	public function update($dados)
	{
		$this->db->set($dados);
		$this->db->where('id', $this->id);
		$this->db->update($this->db->dbprefix('clinica'));
	}

	public function count_results($id_psicologo)
	{
		$this->db->select('id');
		$this->db->from($this->db->dbprefix('clinica'));
		$this->db->where('id_psicologo',$id_psicologo);
		$num_results = $this->db->count_all_results();
		return $num_results;
	}
}
