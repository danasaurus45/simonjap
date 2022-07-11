<?php

class KecamatanSeeder extends Seeder {

    private $table = 'kecamatan';

    public function run() {
        $this->load->helper('date');
        $this->db->truncate($this->table);

        //seed records manually
        $data = array(
            array(
                'nama_kecamatan' => 'Blimbing',
                'jumlah_kelurahan' => 11,
                'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
            ),
            array(
                'nama_kecamatan' => 'Klojen',
                'jumlah_kelurahan' => 11,
                'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
            ),
            array(
                'nama_kecamatan' => 'Kedung Kandang',
                'jumlah_kelurahan' => 12,
                'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
            ),
            array(
                'nama_kecamatan' => 'Sukun',
                'jumlah_kelurahan' => 11,
                'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
            ),
            array(
                'nama_kecamatan' => 'Lowokwaru',
                'jumlah_kelurahan' => 12,
                'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
            ),
        );
        $this->db->insert_batch($this->table, $data);

        echo "The " . $this->table . " table seeds succesfully";
        echo PHP_EOL;
    }
}
