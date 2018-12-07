<?php 

class SessoesModel extends CI_Model
{
	
	public $id;

	public function view($numeroprontuario)
	{
		$this->db->from('prontuario, sessao');
		$this->db->where('prontuario.numeroprontuario = sessao.numero_prontuario');
		$this->db->where('sessao.numero_prontuario = '.$numeroprontuario);
		$query = $this->db->get();
		return $query->result();
	}

	public function view_id($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('sessao');
		return $query->row();
	}

	public function add($dados)
	{
		$this->db->insert('sessao', $dados);
	}
	
	public function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('sessao');
	}

	public function update($dados)
	{
		$this->db->where('id', $this->id);
		$this->db->set($dados);
		$this->db->update('sessao');
	}

	public function search($id, $mes, $ano)
	{
		$query = "SELECT * FROM sessao 
        WHERE numero_prontuario = $id AND 
        Month(data) = $mes AND
        Year(data) = $ano
        GROUP BY data ORDER BY data ASC";
        return $this->db->query($query)->result();
	}

}