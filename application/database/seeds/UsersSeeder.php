<?php

class UsersSeeder extends Seeder {

    private $table = 'users';

    public function run() {
        $this->load->helper('date');
        $this->db->truncate($this->table);

        //seed records manually
        $data = [
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => md5('admin'),
            'nama' => 'admin',
            'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
            'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
        ];
        $this->db->insert($this->table, $data);

        echo "The " . $this->table . " table seeds succesfully";
        echo PHP_EOL;
    }
}
