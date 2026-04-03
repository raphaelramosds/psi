<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Fix_prontuario_alta_encaminhado extends CI_Migration {

	public function up()
	{
		$this->dbforge->modify_column('prontuario', array(
			'alta' => array(
				'name' => 'alta',
				'type' => 'VARCHAR',
				'constraint' => 10,
				'null' => TRUE
			),
			'encaminhado' => array(
				'name' => 'encaminhado',
				'type' => 'VARCHAR',
				'constraint' => 10,
				'null' => TRUE
			)
		));
	}

	public function down()
	{
		$this->dbforge->modify_column('prontuario', array(
			'alta' => array(
				'name' => 'alta',
				'type' => 'CHAR',
				'constraint' => 1,
				'null' => TRUE
			),
			'encaminhado' => array(
				'name' => 'encaminhado',
				'type' => 'CHAR',
				'constraint' => 1,
				'null' => TRUE
			)
		));
	}
}
