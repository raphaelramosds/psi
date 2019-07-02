<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AgendasModel extends CI_Model 
{
    public $id;

    public function add($dados)
    {
        $this->db->insert($this->db->dbprefix('agenda'), $dados);
    }

    public function search($id, $clinica=NULL, $mes=NULL, $ano=NULL)
    {
        $query = "SELECT * FROM ".$this->db->dbprefix('agenda').
        " WHERE clinica_id = $clinica AND 
        psicologo_id = $id AND
        Month(dia) = $mes AND
        Year(dia) = $ano
        GROUP BY dia ORDER BY dia ASC";
        return $this->db->query($query)->result();

    }


    public function delete($id)
    {
        $this->db->where('id', $id);
		$this->db->delete($this->db->dbprefix('agenda'));
    }

    public function update($dados)
    {
        $this->db->set($dados);
        $this->db->where('id', $this->id);
        $this->db->update($this->db->dbprefix('agenda'));
    }
}