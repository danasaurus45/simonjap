<?php

class TotalPendudukSeeder extends Seeder {

    private $table = 'total_penduduk';

    public function run() {
        $this->load->helper('date');
        $this->db->truncate($this->table);

        //seed records manually
        $data = array(
            array(
                'kecamatan_id' => 1,
                'jenis_kelamin' => 'L',
                'warga_negara' => 'WNI',
                'periode' => '2021-02',
                'total' => 101497,
                'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
            ),
            array(
                'kecamatan_id' => 1,
                'jenis_kelamin' => 'P',
                'warga_negara' => 'WNI',
                'periode' => '2021-02',
                'total' => 101870,
                'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
            ),
            array(
                'kecamatan_id' => 2,
                'jenis_kelamin' => 'L',
                'warga_negara' => 'WNI',
                'periode' => '2021-02',
                'total' => 54483,
                'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
            ),
            array(
                'kecamatan_id' => 2,
                'jenis_kelamin' => 'P',
                'warga_negara' => 'WNI',
                'periode' => '2021-02',
                'total' => 56834,
                'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
            ),
            array(
                'kecamatan_id' => 3,
                'jenis_kelamin' => 'L',
                'warga_negara' => 'WNI',
                'periode' => '2021-02',
                'total' => 111977,
                'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
            ),
            array(
                'kecamatan_id' => 3,
                'jenis_kelamin' => 'P',
                'warga_negara' => 'WNI',
                'periode' => '2021-02',
                'total' => 111356,
                'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
            ),
            array(
                'kecamatan_id' => 4,
                'jenis_kelamin' => 'L',
                'warga_negara' => 'WNI',
                'periode' => '2021-02',
                'total' => 108170,
                'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
            ),
            array(
                'kecamatan_id' => 4,
                'jenis_kelamin' => 'P',
                'warga_negara' => 'WNI',
                'periode' => '2021-02',
                'total' => 107866,
                'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
            ),
            array(
                'kecamatan_id' => 5,
                'jenis_kelamin' => 'L',
                'warga_negara' => 'WNI',
                'periode' => '2021-02',
                'total' => 89668,
                'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
            ),
            array(
                'kecamatan_id' => 5,
                'jenis_kelamin' => 'P',
                'warga_negara' => 'WNI',
                'periode' => '2021-02',
                'total' => 90659,
                'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
            ),
            array(
                'kecamatan_id' => 1,
                'jenis_kelamin' => 'L',
                'warga_negara' => 'WNA',
                'periode' => '2021-02',
                'total' => 95,
                'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
            ),
            array(
                'kecamatan_id' => 1,
                'jenis_kelamin' => 'P',
                'warga_negara' => 'WNA',
                'periode' => '2021-02',
                'total' => 69,
                'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
            ),
            array(
                'kecamatan_id' => 2,
                'jenis_kelamin' => 'L',
                'warga_negara' => 'WNA',
                'periode' => '2021-02',
                'total' => 102,
                'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
            ),
            array(
                'kecamatan_id' => 2,
                'jenis_kelamin' => 'P',
                'warga_negara' => 'WNA',
                'periode' => '2021-02',
                'total' => 70,
                'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
            ),
            array(
                'kecamatan_id' => 3,
                'jenis_kelamin' => 'L',
                'warga_negara' => 'WNA',
                'periode' => '2021-02',
                'total' => 19,
                'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
            ),
            array(
                'kecamatan_id' => 3,
                'jenis_kelamin' => 'P',
                'warga_negara' => 'WNA',
                'periode' => '2021-02',
                'total' => 5,
                'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
            ),
            array(
                'kecamatan_id' => 4,
                'jenis_kelamin' => 'L',
                'warga_negara' => 'WNA',
                'periode' => '2021-02',
                'total' => 233,
                'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
            ),
            array(
                'kecamatan_id' => 4,
                'jenis_kelamin' => 'P',
                'warga_negara' => 'WNA',
                'periode' => '2021-02',
                'total' => 215,
                'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
            ),
            array(
                'kecamatan_id' => 5,
                'jenis_kelamin' => 'L',
                'warga_negara' => 'WNA',
                'periode' => '2021-02',
                'total' => 307,
                'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
            ),
            array(
                'kecamatan_id' => 5,
                'jenis_kelamin' => 'P',
                'warga_negara' => 'WNA',
                'periode' => '2021-02',
                'total' => 216,
                'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
            ),
        );
        $this->db->insert_batch($this->table, $data);

        echo "The " . $this->table . " table seeds succesfully";
        echo PHP_EOL;
    }
}
