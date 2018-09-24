<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AgendasModel extends CI_Model 
{
    public $id;

    public function get_events($start, $end)
    {
        return $this->db->where("start >=", $start)->where("end <=", $end)->get("horario");
    }

    public function add_event($dados)
    {
        return $this->db->insert('horario', $dados);
    }

    public function get_event($id)
    {
        return $this->db->where("id", $id)->get("horario");
    }

    public function update_event( $dados)
    {
        $this->db->where('id', $this->id);
        $this->db->set($dados);
        $this->db->update('horario');
    }

}