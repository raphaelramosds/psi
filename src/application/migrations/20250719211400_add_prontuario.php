<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_prontuario extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'numeroprontuario' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'cid10' => array(
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => TRUE
			),
			'diagnostico' => array(
				'type' => 'TEXT',
				'null' => TRUE
			),
			'encaminhado' => array(
				'type' => 'CHAR',
				'constraint' => 1,
				'null' => TRUE
			),
			'alta' => array(
				'type' => 'CHAR',
				'constraint' => 1,
				'null' => TRUE
			),
			'tratamentoadotado' => array(
				'type' => 'TEXT',
				'null' => TRUE
			),
			'evolucao' => array(
				'type' => 'TEXT',
				'null' => TRUE
			),
			'id_psicologo' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
				'null' => TRUE
			),
			'clinica_id' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
				'null' => TRUE
			),
			'paciente_id' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
				'null' => TRUE
			),
			'data' => array(
				'type' => 'DATE',
				'null' => TRUE
			)
		));

		$this->dbforge->add_key('numeroprontuario', TRUE);
		$this->dbforge->create_table('prontuario');
		$this->db->query('ALTER TABLE prontuario ADD CONSTRAINT fk_prontuario_psicologo FOREIGN KEY (id_psicologo) REFERENCES psicologo(id)');
		$this->db->query('ALTER TABLE prontuario ADD CONSTRAINT fk_prontuario_clinica FOREIGN KEY (clinica_id) REFERENCES clinica(id)');
		$this->db->query('ALTER TABLE prontuario ADD CONSTRAINT fk_prontuario_paciente FOREIGN KEY (paciente_id) REFERENCES paciente(id)');
	}

	public function down()
	{
		$this->db->query('ALTER TABLE prontuario DROP FOREIGN KEY fk_prontuario_psicologo');
		$this->db->query('ALTER TABLE prontuario DROP FOREIGN KEY fk_prontuario_clinica');
		$this->db->query('ALTER TABLE prontuario DROP FOREIGN KEY fk_prontuario_paciente');
		$this->dbforge->drop_table('prontuario');
	}
}
