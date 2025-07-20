<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_clinica extends CI_Migration
{
	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'cidade' => array(
				'type' => 'VARCHAR',
				'constraint' => 45,
				'null' => TRUE
			),
			'estado' => array(
				'type' => 'VARCHAR',
				'constraint' => 45,
				'null' => TRUE
			),
			'nome' => array(
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => FALSE
			),
			'telefone' => array(
				'type' => 'VARCHAR',
				'constraint' => 20,
				'null' => TRUE
			),
			'id_psicologo' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
				'null' => TRUE
			)
		));

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('clinica');
		$this->db->query('ALTER TABLE clinica ADD CONSTRAINT fk_clinica_psicologo FOREIGN KEY (id_psicologo) REFERENCES psicologo(id)');
	}

	public function down()
	{
		$this->db->query('ALTER TABLE clinica DROP FOREIGN KEY fk_clinica_psicologo');
		$this->dbforge->drop_table('clinica');
	}
}
