<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProntuariosModel extends CI_Model
{
	
	public $numeroprontuario;

	public function count_results($id){
		$this->db->select('id');
		$this->db->from($this->db->dbprefix('prontuario'));
		$this->db->where('id_psicologo',$id);
		$num_results = $this->db->count_all_results();
		return $num_results;
	}

	public function view($id, $paciente)
	{
		// SELECT * FROM prontuario WHERE psicologo.crp = prontuario.psicologo_crp AND psicologo.crp = $crp
		$this->db->from($this->db->dbprefix('prontuario'));
		$this->db->where($this->db->dbprefix('prontuario').'.id_psicologo = '.$id);
		$this->db->where($this->db->dbprefix('prontuario').'.paciente_id = '.$paciente);
		$query = $this->db->get();
		return $query->result();
	}

	// public function search($id, $nomepaciente)
	// {
	// 	//select * from prontuario, paciente where prontuario.psicologo_crp=500 and prontuario.paciente_id = paciente.idpaciente and nomepaciente like '_inicial_%'
	// 	$this->db->from('prontuario, paciente');
	// 	$this->db->where('prontuario.id_psicologo',$id);
	// 	$this->db->where('prontuario.paciente_id = paciente.id');
	// 	$this->db->like('nome', $nomepaciente);
	// 	$query = $this->db->get()->result();
	// 	return $query;
	// }

	public function add($dados)
	{
		$this->db->insert($this->db->dbprefix('prontuario'),$dados);
	}

	public function delete($idprontuario)
	{
		$this->db->where('numeroprontuario',$idprontuario);
		$this->db->delete($this->db->dbprefix('prontuario'));
	}

	public function view_id($id)
	{
		$this->db->where('numeroprontuario', $id);
		$query = $this->db->get($this->db->dbprefix('prontuario'));
		return $query->row();
	}

	public function update($data)
	{
		$this->db->set($data);
		$this->db->where('numeroprontuario', $this->numeroprontuario);
		$this->db->update($this->db->dbprefix('prontuario'));
	}

	public function search($id,$mes,$ano,$paciente)
	{
        $query = "SELECT * FROM ".$this->db->dbprefix('prontuario')."
        WHERE paciente_id = $paciente AND 
    	id_psicologo = $id AND
        Month(data) = $mes AND
        Year(data) = $ano
        GROUP BY data ORDER BY data ASC";
        return $this->db->query($query)->result();
	}
}
