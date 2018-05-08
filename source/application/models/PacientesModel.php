<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PacientesModel extends CI_Model {
	public $id;
	function __construct(){
		parent::__construct();
	}

	public function view($crp,$limit = NULL, $offset = NULL){
		if ($limit) {
			//Número de registro a serem retornados ($limit) e a página de registro ($offset)
			$this->db->limit($limit, $offset);
		}
		$this->db->from('psicologo, paciente');
		$this->db->where('psicologo.crp = paciente.psicologo_crp');
		$this->db->where('psicologo_crp', $crp);
		$this->db->order_by("nomepaciente", "asc");
		$query = $this->db->get();
		return $query->result();
	}

	public function search($crp,$nomepaciente,$limit = NULL, $offset = NULL){
		//SELECT * FROM PACIENTE WHERE psicologo_crp = $crp AND LIKE '%Raphael%'
		if ($limit) {
			//Número de registro a serem retornados ($limit) e a página de registro ($offset)
			$this->db->limit($limit, $offset);
		}
		$this->db->from('paciente');
		$this->db->where('psicologo_crp', $crp);
		$this->db->like('nomepaciente', $nomepaciente);
		return $this->db->get()->result();
	}

	public function add($dados){
		$this->db->insert('paciente',$dados);
	}

	public function delete($id){
		$this->db->where('idpaciente',$id);
		$this->db->delete('paciente');
	}

	public function receberId($id){
		$this->db->where('idpaciente', $id);
		$query = $this->db->get('paciente');
		return $query->row();
	}
	public function update($dados){
		$this->db->set($dados);
		$this->db->where('idpaciente',$this->id);
		$this->db->update('paciente');
	}
}
