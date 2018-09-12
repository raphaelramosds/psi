<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HorariosModel extends CI_Model 
{
    public function add($dados)
    {
        $this->db->trans_start();
        $this->db->insert('horario',$dados);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }
    }
}