<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_usuario extends CI_Migration  {
	public function up () {
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'username' => array(
				'type' => 'VARCHAR',
				'constraint' => 45,
				'null' => FALSE
			),
			'email' => array(
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => TRUE
			),
			'role' => array(
				'type' => 'INT',
				'default' => 1
			),
			'senha' => array(
				'type' => 'VARCHAR',
				'constraint' => 80,
				'null' => FALSE
			)
		));

		$this->dbforge->add_key('id', TRUE); // PRIMARY KEY
		$this->dbforge->create_table('usuario');

		$this->db->query('ALTER TABLE usuario ADD CONSTRAINT uq_username UNIQUE (username)');
		$this->db->query('ALTER TABLE usuario ADD CONSTRAINT uq_email UNIQUE (email)');
	}

	public function down () {
		$this->db->query('ALTER TABLE usuario DROP INDEX uq_username');
		$this->db->query('ALTER TABLE usuario DROP INDEX uq_email');
		$this->dbforge->drop_table('usuario', TRUE);
	}
}
