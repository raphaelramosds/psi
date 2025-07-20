<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_paciente extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'numerosus' => array(
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => TRUE
			),
			'cartaosaude' => array(
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => TRUE
			),
			'profissao' => array(
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => TRUE
			),
			'email' => array(
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => FALSE
			),
			'nome' => array(
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => FALSE
			),
			'sexo' => array(
				'type' => 'CHAR',
				'constraint' => 1,
				'null' => TRUE
			),
			'id_psicologo' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
				'null' => TRUE
			),
			'telefone' => array(
				'type' => 'VARCHAR',
				'constraint' => 20,
				'null' => TRUE
			)
		));

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('paciente');
		$this->db->query('ALTER TABLE paciente ADD CONSTRAINT fk_paciente_psicologo FOREIGN KEY (id_psicologo) REFERENCES psicologo(id)');
		$this->db->query('ALTER TABLE paciente ADD CONSTRAINT uq_emailpaciente UNIQUE (email)');
	}

	public function down()
	{
		$this->db->query('ALTER TABLE paciente DROP FOREIGN KEY fk_paciente_psicologo');
		$this->db->query('ALTER TABLE paciente DROP INDEX uq_emailpaciente');
		$this->dbforge->drop_table('paciente');
	}
}
