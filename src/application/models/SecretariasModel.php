<?php 

class SecretariasModel extends CI_Model
{
	
	public $id;

	public function add($dados)
	{
		$this->db->insert($this->db->dbprefix('secretaria'),$dados);
	}

	public function update($dados)
	{ 
		$this->db->set($dados);
		$this->db->where('id', $this->id);	
		$this->db->update($this->db->dbprefix('secretaria'));
	}

	public function count_results($id)
	{
		$this->db->select('id');
		$this->db->from($this->db->dbprefix('secretaria'));
		$this->db->where($this->db->dbprefix('secretaria').'.psicologo_id', $id);
		$num_results = $this->db->count_all_results();
		return $num_results;
	}

	public function view($id)
	{
		$this->db->from($this->db->dbprefix('secretaria'));
		$this->db->where($this->db->dbprefix('secretaria').'.psicologo_id', $id);
		return $this->db->get()->result();
	}

	public function view_user_by_secretaria($id_secretaria)
	{
		$q = $this->db->query("SELECT u.id FROM ".$this->db->dbprefix('usuario')." as u INNER JOIN ". $this->db->dbprefix('secretaria') ." as e ON (e.usuario_idusuario = u.id) WHERE e.id = ".$id_secretaria)->row();
		return $q;
	}
	
	public function view_id($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get($this->db->dbprefix('secretaria'));
		return $query->row();
	}

	public function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete($this->db->dbprefix('secretaria'));
	}


}