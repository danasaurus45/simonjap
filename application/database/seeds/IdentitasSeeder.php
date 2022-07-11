<?php

class IdentitasSeeder extends Seeder {

    private $table = 'identitas';

    public function run() {
        $this->load->helper('date');
        $this->db->truncate($this->table);

        //seed records manually
        $data = array(
            array(
                'kecamatan_id' => 1,
                'periode' => '2021-03',
                'wajib_akta' => 54901,
                'punya_akta' => 52051,
                'wajib_ktp_laki' => 76268,
                'wajib_ktp_perempuan' => 78286,
                'total_wajib_ktp' => 154554,
                'punya_ktp' => 150057,
                'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
            ),
            array(
                'kecamatan_id' => 2,
                'periode' => '2021-03',
                'wajib_akta' => 27481,
                'punya_akta' => 25958,
                'wajib_ktp_laki' => 41994,
                'wajib_ktp_perempuan' => 44866,
                'total_wajib_ktp' => 86860,
                'punya_ktp' => 84784,
                'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
            ),
            array(
                'kecamatan_id' => 3,
                'periode' => '2021-03',
                'wajib_akta' => 63179,
                'punya_akta' => 59424,
                'wajib_ktp_laki' => 83336,
                'wajib_ktp_perempuan' => 84096,
                'total_wajib_ktp' => 167432,
                'punya_ktp' => 155177,
                'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
            ),
            array(
                'kecamatan_id' => 4,
                'periode' => '2021-03',
                'wajib_akta' => 59078,
                'punya_akta' => 56130,
                'wajib_ktp_laki' => 80901,
                'wajib_ktp_perempuan' => 82502,
                'total_wajib_ktp' => 163403,
                'punya_ktp' => 157296,
                'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
            ),
            array(
                'kecamatan_id' => 5,
                'periode' => '2021-03',
                'wajib_akta' => 48245,
                'punya_akta' => 44939,
                'wajib_ktp_laki' => 67557,
                'wajib_ktp_perempuan' => 69841,
                'total_wajib_ktp' => 137398,
                'punya_ktp' => 130791,
                'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
            ),
        );

        $this->db->insert_batch($this->table, $data);

        echo "The " . $this->table . " table seeds succesfully";
        echo PHP_EOL;
    }
}
