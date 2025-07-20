<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_sessao extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'titulo' => array(
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => TRUE
			),
			'descricao' => array(
				'type' => 'TEXT',
				'null' => TRUE
			),
			'data' => array(
				'type' => 'DATE',
				'null' => TRUE
			),
			'numero_prontuario' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
				'null' => TRUE
			)
		));

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('sessao');
		$this->db->query('ALTER TABLE sessao 
            ADD CONSTRAINT fk_prontuario_sessao 
            FOREIGN KEY (numero_prontuario) REFERENCES prontuario(numeroprontuario) 
            ON DELETE CASCADE ON UPDATE CASCADE');
	}

	public function down()
	{
		$this->db->query('ALTER TABLE sessao DROP FOREIGN KEY fk_sessao_prontuario');
		$this->dbforge->drop_table('sessao');
	}
}
