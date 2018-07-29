<?php 

class SecretariasModel extends CI_Model
{
	
	public $id;

	public function add($dados)
	{
		$this->db->insert('secretaria',$dados);
	}

}