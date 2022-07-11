<?php

class Migration_create_kecamatan extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id_kecamatan' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'nama_kecamatan' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
            ),
            'jumlah_kelurahan' => array(
                'type' => 'INT',
                'constraint' => 2,
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
        $this->dbforge->add_key('id_kecamatan', TRUE);
        $this->dbforge->create_table('kecamatan');
    }

    public function down() {
        $this->dbforge->drop_table('kecamatan');
    }

}