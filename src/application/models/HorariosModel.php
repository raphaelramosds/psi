<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HorariosModel extends CI_Model 
{
    public function add($dados)
    {
        $this->db->insert('horario',$dados);
    }
}