<?php

class AgamaSeeder extends Seeder {

    private $table = 'agama';

    public function run() {
        $this->load->helper('date');
        $this->db->truncate($this->table);

        //seed records manually
        $data = array(
            array(
                'kecamatan_id' => 1,
                'periode' => '2021-03',
                'islam' => 182726,
                'kristen' => 12445,
                'katholik' => 7178,
                'hindu' => 487,
                'buddha' => 870,
                'konghucu' => 30,
                'penghayat_kepercayaan' => 10,
                'total' => 203746,
                'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
            ),
            array(
                'kecamatan_id' => 2,
                'periode' => '2021-03',
                'islam' => 93009,
                'kristen' => 8770,
                'katholik' => 7760,
                'hindu' => 162,
                'buddha' => 1754,
                'konghucu' => 59,
                'penghayat_kepercayaan' => 20,
                'total' => 111534,
                'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
            ),
            array(
                'kecamatan_id' => 3,
                'periode' => '2021-03',
                'islam' => 211558,
                'kristen' => 8066,
                'katholik' => 3431,
                'hindu' => 304,
                'buddha' => 316,
                'konghucu' => 18,
                'penghayat_kepercayaan' => 29,
                'total' => 223722,
                'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
            ),
            array(
                'kecamatan_id' => 4,
                'periode' => '2021-03',
                'islam' => 191577,
                'kristen' => 14649,
                'katholik' => 9211,
                'hindu' => 224,
                'buddha' => 922,
                'konghucu' => 27,
                'penghayat_kepercayaan' => 30,
                'total' => 216640,
                'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
            ),
            array(
                'kecamatan_id' => 5,
                'periode' => '2021-03',
                'islam' => 164569,
                'kristen' => 8420,
                'katholik' => 6878,
                'hindu' => 336,
                'buddha' => 749,
                'konghucu' => 13,
                'penghayat_kepercayaan' => 12,
                'total' => 180977,
                'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
            ),
            
        );
        $this->db->insert_batch($this->table, $data);

        echo "The " . $this->table . " table seeds succesfully";
        echo PHP_EOL;
    }
}
