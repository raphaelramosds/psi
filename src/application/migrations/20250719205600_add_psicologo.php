<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_psicologo extends CI_Migration
{
	public function up () {
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'crp' => array(
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => FALSE
			),
			'nome' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
				'null' => FALSE
			),
			'sexo' => array(
				'type' => 'CHAR',
				'constraint' => 1,
				'null' => TRUE
			),
			'datanascimento' => array(
				'type' => 'DATE',
				'null' => TRUE
			),
			'usuario_idusuario' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
				'null' => TRUE
			),
			'codigo' => array(
				'type' => 'INT',
				'null' => TRUE
			)
		));

		$this->dbforge->add_key('id', TRUE);

		$this->dbforge->create_table('psicologo');

		$this->db->query('ALTER TABLE psicologo ADD CONSTRAINT fk_usuario FOREIGN KEY (usuario_idusuario) REFERENCES usuario(id)');

		$this->db->query('ALTER TABLE psicologo ADD CONSTRAINT uq_crp UNIQUE (crp)');
	}

	public function down () {
		$this->db->query('ALTER TABLE psicologo DROP FOREIGN KEY fk_usuario');
		$this->db->query('ALTER TABLE psicologo DROP INDEX uq_crp');
		$this->dbforge->drop_table('psicologo');
	}
}
