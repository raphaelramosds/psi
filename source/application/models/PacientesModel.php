<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PacientesModel extends CI_Model {
	public $id;
	function __construct(){
		parent::__construct();
	}

	public function view($id,$limit = NULL, $offset = NULL){
		if ($limit) {
			//Número de registro a serem retornados ($limit) e a página de registro ($offset)
			$this->db->limit($limit, $offset);
		}
		$this->db->from('psicologo, paciente');
		$this->db->where('psicologo.idpsicologo = paciente.id_psicologo');
		$this->db->where('id_psicologo', $id);
		$this->db->order_by("nomepaciente", "asc");
		$query = $this->db->get();
		return $query->result();
	}

	public function search($id,$nomepaciente,$limit = NULL, $offset = NULL){
		//SELECT * FROM PACIENTE WHERE psicologo_crp = $crp AND LIKE '%Raphael%'
		if ($limit) {
			//Número de registro a serem retornados ($limit) e a página de registro ($offset)
			$this->db->limit($limit, $offset);
		}
		$this->db->from('paciente');
		$this->db->where('id_psicologo', $id);
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
