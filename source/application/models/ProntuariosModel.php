<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProntuariosModel extends CI_Model{
	public $numeroprontuario;

	function __construct(){
		parent::__construct();
	}

	public function view($crp, $paciente){
		// SELECT * FROM psicologo, prontuario WHERE psicologo.crp = prontuario.psicologo_crp AND psicologo.crp = $crp
		$this->db->from('psicologo, prontuario');
		$this->db->where('prontuario.psicologo_crp = '.$crp);
		$this->db->where('prontuario.paciente_id = '.$paciente);
		$query = $this->db->get();
		return $query->result();
	}

	public function search($crp, $nomepaciente){
		//select * from prontuario, paciente where prontuario.psicologo_crp=500 and prontuario.paciente_id = paciente.idpaciente and nomepaciente like '_inicial_%'
		$this->db->from('prontuario, paciente');
		$this->db->where('prontuario.psicologo_crp',$crp);
		$this->db->where('prontuario.paciente_id = paciente.idpaciente');
		$this->db->like('nomepaciente', $nomepaciente);
		$query = $this->db->get()->result();
		return $query;
	}

	public function add($dados){
		$this->db->insert('prontuario',$dados);
	}
	public function delete($idprontuario){
		$this->db->where('numeroprontuario',$idprontuario);
		$this->db->delete('prontuario');
	}

	public function recuperarId($id){
		$this->db->where('numeroprontuario', $id);
		$query = $this->db->get('prontuario');
		return $query->row();
	}

	public function update($data){
		$this->db->set($data);
		$this->db->where('numeroprontuario', $this->numeroprontuario);
		$this->db->update('prontuario');
	}
}
