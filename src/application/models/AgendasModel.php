<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AgendasModel extends CI_Model 
{
    public function add($dados){
        $this->db->insert('agenda', $dados);
    }


}