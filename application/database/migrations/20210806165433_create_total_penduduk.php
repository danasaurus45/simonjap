<?php

class Migration_create_total_penduduk extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id_total' => array(
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
            'jenis_kelamin' => array(
                'type' => 'ENUM("L","P")'
            ),
            'warga_negara' => array(
                'type' => 'ENUM("WNI","WNA")'
            ),
            'periode' => array(
                'type' => 'VARCHAR',
                'constraint' => 10
            ),
            'lahir' => array(
                'type' => 'INT',
                'constraint' => 9,
                'null' => TRUE
            ),
            'mati' => array(
                'type' => 'INT',
                'constraint' => 9,
                'null' => TRUE
            ),
            'pendatang' => array(
                'type' => 'INT',
                'constraint' => 9,
                'null' => TRUE
            ),
            'pindah' => array(
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
        $this->dbforge->add_key('id_total', TRUE);
        $this->dbforge->create_table('total_penduduk');
    }

    public function down() {
        $this->dbforge->drop_table('total_penduduk');
    }

}