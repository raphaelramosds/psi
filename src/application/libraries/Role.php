<?php

class Role 
{
    public $CI;

    public function __construct()
    {
        $this->CI =& get_instance();    
    }

    public function identifyUser($role, $id_user)
    {
        if ($role == 1) 
        {
            $this->CI->db->where('psicologo.usuario_idusuario', $id_user);
            $request = $this->CI->db->get('psicologo')->result();
            return $request;
        }
        else if ($role == 2) 
        {
            $this->CI->db->where('secretaria.usuario_idusuario', $id_user);
            $request = $this->CI->db->get('secretaria')->result();
            return $request;
        }
    }
}