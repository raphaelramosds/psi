<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_agenda extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'clinica_id' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
				'null' => TRUE
			),
			'nomepaciente' => array(
				'type' => 'VARCHAR',
				'constraint' => 500,
				'null' => TRUE
			),
			'telefone' => array(
				'type' => 'VARCHAR',
				'constraint' => 40,
				'null' => TRUE
			),
			'email' => array(
				'type' => 'VARCHAR',
				'constraint' => 80,
				'null' => TRUE
			),
			'dia' => array(
				'type' => 'DATE',
				'null' => TRUE
			),
			'horario' => array(
				'type' => 'TIME',
				'null' => TRUE
			),
			'psicologo_id' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
				'null' => TRUE
			)
		));

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('agenda');
		$this->db->query('ALTER TABLE agenda ADD CONSTRAINT fk_agenda_clinica FOREIGN KEY (clinica_id) REFERENCES clinica(id)');
		$this->db->query('ALTER TABLE agenda ADD CONSTRAINT fk_agenda_psicologo FOREIGN KEY (psicologo_id) REFERENCES psicologo(id)');
	}

	public function down()
	{
		$this->db->query('ALTER TABLE agenda DROP FOREIGN KEY fk_agenda_clinica');
		$this->db->query('ALTER TABLE agenda DROP FOREIGN KEY fk_agenda_psicologo');
		$this->dbforge->drop_table('agenda');
	}
}
