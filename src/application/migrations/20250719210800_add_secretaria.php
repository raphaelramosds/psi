<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_secretaria extends CI_Migration
{
	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'nome' => array(
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => TRUE
			),
			'endereco' => array(
				'type' => 'TEXT',
				'null' => TRUE
			),
			'telefone' => array(
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => TRUE
			),
			'sexo' => array(
				'type' => 'CHAR',
				'constraint' => 1,
				'null' => TRUE
			),
			'psicologo_id' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
				'null' => TRUE
			),
			'usuario_idusuario' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
				'null' => TRUE
			)
		));

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('secretaria');

		$this->db->query('ALTER TABLE secretaria ADD CONSTRAINT fk_secretaria_psicologo FOREIGN KEY (psicologo_id) REFERENCES psicologo(id)');
		$this->db->query('ALTER TABLE secretaria ADD CONSTRAINT fk_secretaria_usuario FOREIGN KEY (usuario_idusuario) REFERENCES usuario(id)');
	}

	public function down()
	{
		$this->db->query('ALTER TABLE secretaria DROP FOREIGN KEY fk_secretaria_psicologo');
		$this->db->query('ALTER TABLE secretaria DROP FOREIGN KEY fk_secretaria_usuario');
		$this->dbforge->drop_table('secretaria');
	}
}
