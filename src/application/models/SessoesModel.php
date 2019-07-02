<?php 

class SessoesModel extends CI_Model
{
	
	public $id;

	public function view($numeroprontuario)
	{
		$this->db->from($this->db->dbprefix('prontuario').','. $this->db->dbprefix('sessao'));
		$this->db->where($this->db->dbprefix('prontuario').'.numeroprontuario ='. $this->db->dbprefix('sessao').'.numero_prontuario');
		$this->db->where($this->db->dbprefix('sessao').'.numero_prontuario = '.$numeroprontuario);
		$query = $this->db->get();
		return $query->result();
	}

	public function view_id($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get($this->db->dbprefix('sessao'));
		return $query->row();
	}

	public function add($dados)
	{
		$this->db->insert($this->db->dbprefix('sessao'), $dados);
	}
	
	public function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete($this->db->dbprefix('sessao'));
	}

	public function update($dados)
	{
		$this->db->where('id', $this->id);
		$this->db->set($dados);
		$this->db->update($this->db->dbprefix('sessao'));
	}

	public function search($id, $mes, $ano)
	{
		$query = "SELECT * FROM ".$this->db->dbprefix('sessao').
		" WHERE numero_prontuario = $id AND 
        Month(data) = $mes AND
        Year(data) = $ano
		GROUP BY data ORDER BY data ASC";
		$resultado = $this->db->query($query);

		return $resultado->result();
	}

}