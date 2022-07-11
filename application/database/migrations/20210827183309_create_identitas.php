<?php

class Migration_create_identitas extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id_identitas' => array(
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
            'wajib_akta' => array(
                'type' => 'INT',
                'constraint' => 9,
                'null' => TRUE
            ),
            'punya_akta' => array(
                'type' => 'INT',
                'constraint' => 9,
                'null' => TRUE
            ),
            'wajib_ktp_laki' => array(
                'type' => 'INT',
                'constraint' => 9,
                'null' => TRUE
            ),
            'wajib_ktp_perempuan' => array(
                'type' => 'INT',
                'constraint' => 9,
                'null' => TRUE
            ),
            'total_wajib_ktp' => array(
                'type' => 'INT',
                'constraint' => 9,
                'null' => TRUE
            ),
            'punya_ktp' => array(
                'type' => 'INT',
                'constraint' => 9,
                'null' => TRUE
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
        $this->dbforge->add_key('id_identitas', TRUE);
        $this->dbforge->create_table('identitas');
    }

    public function down() {
        $this->dbforge->drop_table('identitas');
    }

}