<?php

class Migration_create_total_kk extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id_totalkk' => array(
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
            'jumlah_kk' => array(
                'type' => 'INT',
                'constraint' => 9,
                'null' => TRUE
            ),
            'l' => array(
                'type' => 'INT',
                'constraint' => 9,
                'null' => TRUE
            ),
            'p' => array(
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
        $this->dbforge->add_key('id_totalkk', TRUE);
        $this->dbforge->create_table('total_kk');
    }

    public function down() {
        $this->dbforge->drop_table('total_kk');
    }

}