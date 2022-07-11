<?php

class TotalKkSeeder extends Seeder {

    private $table = 'total_kk';

    public function run() {
        $this->load->helper('date');
        $this->db->truncate($this->table);

        //seed records manually
        $data = array(
            array(
                'kecamatan_id' => 1,
                'periode' => '2021-03',
                'jumlah_kk' => 67154,
                'l' => 101903,
                'p' => 101843,
                'total' => 203746,
                'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
            ),
            array(
                'kecamatan_id' => 2,
                'periode' => '2021-03',
                'jumlah_kk' => 38511,
                'l' => 54777,
                'p' => 56757,
                'total' => 111534,
                'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
            ),
            array(
                'kecamatan_id' => 3,
                'periode' => '2021-03',
                'jumlah_kk' => 71910,
                'l' => 112263,
                'p' => 111459,
                'total' => 223722,
                'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
            ),
            array(
                'kecamatan_id' => 4,
                'periode' => '2021-03',
                'jumlah_kk' => 71412,
                'l' => 108659,
                'p' => 107981,
                'total' => 216640,
                'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
            ),
            array(
                'kecamatan_id' => 5,
                'periode' => '2021-03',
                'jumlah_kk' => 59311,
                'l' => 90113,
                'p' => 90864,
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
