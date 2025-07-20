<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_clinica_secretaria extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'secretaria_id' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
				'null' => TRUE
			),
			'clinica_id' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
				'null' => TRUE
			)
		));

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('clinica_secretaria');
		$this->db->query('ALTER TABLE clinica_secretaria ADD CONSTRAINT fk_clinica_secretaria_clinica FOREIGN KEY (clinica_id) REFERENCES clinica(id)');
		$this->db->query('ALTER TABLE clinica_secretaria ADD CONSTRAINT fk_clinica_secretaria_secretaria FOREIGN KEY (secretaria_id) REFERENCES secretaria(id)');
	}

	public function down()
	{
		$this->db->query('ALTER TABLE clinica_secretaria DROP FOREIGN KEY fk_clinica_secretaria_clinica');
		$this->db->query('ALTER TABLE clinica_secretaria DROP FOREIGN KEY fk_clinica_secretaria_secretaria');
		$this->dbforge->drop_table('clinica_secretaria');
	}
}
