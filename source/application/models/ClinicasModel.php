<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClinicasModel extends CI_Model {
	public $idclinica;

	function __construct(){
		parent::__construct();
	}

	public function view($id,$limit = NULL, $offset = NULL){
		if ($limit) {
			$this->db->limit($limit, $offset);
		}
		$this->db->from('psicologo, clinica');
		$this->db->where('psicologo.idpsicologo = clinica.id_psicologo');
		$this->db->where('id_psicologo',$id);
		$this->db->order_by("nomeclinica", "asc");
		$query = $this->db->get();
		return $query->result();
	}

	public function search($id, $nomeclinica){
		$this->db->from('clinica');
		$this->db->where('clinica.id_psicologo = '.$id);
		$this->db->like('nomeclinica', $nomeclinica);
		return $this->db->get()->result();
	}

	public function add($dados){
		$this->db->insert('clinica',$dados);
	}

	public function delete($id){
		$this->db->where('idclinica', $id);
		$this->db->delete('clinica');
	}

	public function recuperarId($id){
		$this->db->where('idclinica', $id);
		$query = $this->db->get('clinica');
		return $query->row();
	}

	public function update($dados){
		$this->db->set($dados);
		$this->db->where('idclinica', $this->idclinica);
		$this->db->update('clinica');
	}
}
