<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UsersModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getData()
    {
        return $this->db->get('users')->result();
    }

    public function getUser($id)
    {
        return $this->db->where('id_user', $id)->get('users')->result();
    }

    public function login($username, $password)
    {
        return $this->db->where('username', $username)->where('password', $password)->get('users')->result();
    }

    public function insert($data)
    {
        return $this->db->insert('users', $data);
    }

    public function update($id, $data) 
    {
        $this->db->where('id_user', $id);
        return $this->db->update('users', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('users', array('id_user' => $id));
    }

}
