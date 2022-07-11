<?php

class Migration_create_umur extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id_umur' => array(
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
            'umur0_4' => array(
                'type' => 'INT',
                'constraint' => 9,
                'null' => TRUE
            ),
            'umur5_9' => array(
                'type' => 'INT',
                'constraint' => 9,
                'null' => TRUE
            ),
            'umur10_14' => array(
                'type' => 'INT',
                'constraint' => 9,
                'null' => TRUE
            ),

            'umur15_19' => array(
                'type' => 'INT',
                'constraint' => 9,
                'null' => TRUE
            ),
            'umur20_24' => array(
                'type' => 'INT',
                'constraint' => 9,
                'null' => TRUE
            ),
            'umur25_29' => array(
                'type' => 'INT',
                'constraint' => 9,
                'null' => TRUE
            ),
            'umur30_34' => array(
                'type' => 'INT',
                'constraint' => 9,
                'null' => TRUE
            ),
            'umur35_39' => array(
                'type' => 'INT',
                'constraint' => 9,
                'null' => TRUE
            ),
            'umur40_44' => array(
                'type' => 'INT',
                'constraint' => 9,
                'null' => TRUE
            ),
            'umur45_49' => array(
                'type' => 'INT',
                'constraint' => 9,
                'null' => TRUE
            ),
            'umur50_54' => array(
                'type' => 'INT',
                'constraint' => 9,
                'null' => TRUE
            ),
            'umur55_59' => array(
                'type' => 'INT',
                'constraint' => 9,
                'null' => TRUE
            ),
            'umur60_64' => array(
                'type' => 'INT',
                'constraint' => 9,
                'null' => TRUE
            ),
            'umur65_atas' => array(
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
        $this->dbforge->add_key('id_umur', TRUE);
        $this->dbforge->create_table('umur');
    }

    public function down() {
        $this->dbforge->drop_table('umur');
    }

}