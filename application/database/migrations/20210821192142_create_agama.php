<?php

class Migration_create_agama extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id_agama' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'kecamatan_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE
            ),
            'periode' => array(
                'type' => 'VARCHAR',
                'constraint' => 10
            ),
            'islam' => array(
                'type' => 'INT',
                'constraint' => 9,
                'null' => TRUE
            ),
            'kristen' => array(
                'type' => 'INT',
                'constraint' => 9,
                'null' => TRUE
            ),
            'katholik' => array(
                'type' => 'INT',
                'constraint' => 9,
                'null' => TRUE
            ),

            'hindu' => array(
                'type' => 'INT',
                'constraint' => 9,
                'null' => TRUE
            ),
            'buddha' => array(
                'type' => 'INT',
                'constraint' => 9,
                'null' => TRUE
            ),
            'konghucu' => array(
                'type' => 'INT',
                'constraint' => 9,
                'null' => TRUE
            ),
            'penghayat_kepercayaan' => array(
                'type' => 'INT',
                'constraint' => 9,
                'null' => TRUE
            ),
            'total' => array(
                'type' => 'INT',
                'constraint' => 9
            ),
            'created_at' => array(
				'type' => 'DATETIME',
                'null' => TRUE
			),
			'updated_at' => array(
				'type' => 'DATETIME',
                'null' => TRUE
			),
        ));
        $this->dbforge->add_key('id_agama', TRUE);
        $this->dbforge->create_table('agama');
    }

    public function down() {
        $this->dbforge->drop_table('agama');
    }

}