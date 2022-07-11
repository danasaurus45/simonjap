<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('date');
        $this->load->model('UsersModel', 'data_user');
    }

    public function index()
    {
        $data['user'] = $this->data_user->getData();
        $this->load->view('pages/users', $data);
    }

    public function create()
    {
        $this->load->view('pages/users-add');
    }

    public function store()
    {
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));

        $data = array(
            'nama' => $nama,
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
            'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
        );

        $query = $this->data_user->insert($data);
        if ($query) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert">×</button><strong>Sukses!</strong> Data berhasil ditambahkan</p></div>');
            redirect('users');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert">×</button><strong>Gagal!</strong> Data gagal ditambahkan</p></div>');
            redirect('users/create');
        }
    }

    public function edit($id)
    {
        $data['user'] = $this->data_user->getUser($id);
        $this->load->view('pages/users-edit', $data);
    }

    public function update()
    {
        $id_user = $this->input->post('id');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        if ($password == null) {
            $data = array(
                'nama' => $nama,
                'username' => $username,
                'email' => $email,
                'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
            );
            $query = $this->data_user->update($id_user, $data);
            if ($query) {
                $this->session->set_flashdata('msg', '<div class="alert alert-info" role="alert"><button type="button" class="close" data-dismiss="alert">×</button><strong>Sukses!</strong> Data berhasil diubah</p></div>');
                redirect('users');
            }
        } else {
            $data = array(
                'nama' => $nama,
                'username' => $username,
                'email' => $email,
                'password' => md5($password),
                'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
            );
            $query = $this->data_user->update($id_user, $data);
            if ($query) {
                $this->session->set_flashdata('msg', '<div class="alert alert-info" role="alert"><button type="button" class="close" data-dismiss="alert">×</button><strong>Sukses!</strong> Data berhasil diubah</p></div>');
                redirect('users');
            }
        }        
    }

    public function destroy($id)
    {
        $query = $this->data_user->delete($id);
        if ($query) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert">×</button><strong>Sukses!</strong> Data berhasil dihapus</p></div>');
            redirect('users', 'refresh');
        }        
    }
}
