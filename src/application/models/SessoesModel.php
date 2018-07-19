<?php 

class SessoesModel extends CI_Model
{
	
	public $idsessao;

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
		$this->db->where('idsessao', $id);
		$query = $this->db->get('sessao');
		return $query->row();
	}

	public function add($dados)
	{
		$this->db->insert('sessao', $dados);
	}
	
	public function delete($id)
	{
		$this->db->where('idsessao',$id);
		$this->db->delete('sessao');
	}

	public function update($dados)
	{
		$this->db->where('idsessao', $this->idsessao);
		$this->db->set($dados);
		$this->db->update('sessao');
	}

}