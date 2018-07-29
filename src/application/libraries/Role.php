<?php

class Role 
{
    public $CI;
    public $tela_psicologo  = array(
        'menu' => 'home/menupsicologo',
        'index'=> 'home/index'
    );

    public $tela_secretaria = array(
        'menu'  => 'home/menusecretaria',
        'index' => 'home/secretaria'
    );

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

    public function menuView($id)
    {
        $usuario = $this->CI->db->query("SELECT role FROM usuario WHERE id = '".$id."'")->row_array();

        $data_view = ($usuario['role'] == 1) ? $this->tela_psicologo : $this->tela_secretaria; 
        return $data_view;
    }
}