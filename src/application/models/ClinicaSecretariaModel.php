<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClinicaSecretariaModel extends CI_Model 
{
    public $id;

    public function clinicasEspecificas($id,$psicologo)
    {
        $query = $this->db->query("SELECT * FROM clinica as c
        WHERE c.id NOT IN (SELECT cs.clinica_id FROM clinica_secretaria as cs WHERE cs.secretaria_id = $id)
        AND c.id_psicologo = $psicologo");
        return $query->result();

    }

    public function add($dados){
        $this->db->insert('clinica_secretaria', $dados);
    }

    public function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('clinica_secretaria');
    }

}