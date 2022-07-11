<?php

class UmurSeeder extends Seeder {

    private $table = 'umur';

    public function run() {
        $this->load->helper('date');
        $this->db->truncate($this->table);

        //seed records manually
        $data = array(
            array(
                'kecamatan_id' => 1,
                'periode' => '2021-03',
                'umur0_4' => 12211,
                'umur5_9' => 14837,
                'umur10_14' => 15466,
                'umur15_19' => 15531,
                'umur20_24' => 15295,
                'umur25_29' => 14784,
                'umur30_34' => 14756,
                'umur35_39' => 16866,
                'umur40_44' => 16343,
                'umur45_49' => 15113,
                'umur50_54' => 13727,
                'umur55_59' => 11900,
                'umur60_64' => 9526,
                'umur65_atas' => 17391,
                'total' => 203746,
                'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
            ),
            array(
                'kecamatan_id' => 2,
                'periode' => '2021-03',
                'umur0_4' => 5649,
                'umur5_9' => 7309,
                'umur10_14' => 8095,
                'umur15_19' => 8042,
                'umur20_24' => 7743,
                'umur25_29' => 7120,
                'umur30_34' => 7723,
                'umur35_39' => 8963,
                'umur40_44' => 9018,
                'umur45_49' => 8386,
                'umur50_54' => 7924,
                'umur55_59' => 6568,
                'umur60_64' => 5716,
                'umur65_atas' => 13278,
                'total' => 111534,
                'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
            ),
            array(
                'kecamatan_id' => 3,
                'periode' => '2021-03',
                'umur0_4' => 14583,
                'umur5_9' => 17563,
                'umur10_14' => 17332,
                'umur15_19' => 17310,
                'umur20_24' => 17071,
                'umur25_29' => 17275,
                'umur30_34' => 18523,
                'umur35_39' => 19248,
                'umur40_44' => 18100,
                'umur45_49' => 15314,
                'umur50_54' => 13767,
                'umur55_59' => 12112,
                'umur60_64' => 9621,
                'umur65_atas' => 15903,
                'total' => 223722,
                'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
            ),
            array(
                'kecamatan_id' => 4,
                'periode' => '2021-03',
                'umur0_4' => 13309,
                'umur5_9' => 16129,
                'umur10_14' => 16630,
                'umur15_19' => 16323,
                'umur20_24' => 15665,
                'umur25_29' => 15481,
                'umur30_34' => 16496,
                'umur35_39' => 18905,
                'umur40_44' => 18258,
                'umur45_49' => 15476,
                'umur50_54' => 14345,
                'umur55_59' => 11937,
                'umur60_64' => 10149,
                'umur65_atas' => 17537,
                'total' => 216640,
                'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
            ),
            array(
                'kecamatan_id' => 5,
                'periode' => '2021-03',
                'umur0_4' => 11044,
                'umur5_9' => 13210,
                'umur10_14' => 13564,
                'umur15_19' => 13186,
                'umur20_24' => 12553,
                'umur25_29' => 12914,
                'umur30_34' => 13950,
                'umur35_39' => 15953,
                'umur40_44' => 15665,
                'umur45_49' => 13053,
                'umur50_54' => 11655,
                'umur55_59' => 9943,
                'umur60_64' => 8456,
                'umur65_atas' => 15841,
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
