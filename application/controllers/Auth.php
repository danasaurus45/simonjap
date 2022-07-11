<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('UsersModel', 'data_user');
      }
    
      public function index() {
        $this->load->view('login');
      }

    public function login() {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        if ($username && $password) {
            $user = $this->data_user->login($username, $password);
            if (!empty($user)) {
                $this->session->set_userdata('id_user', $user[0]->id_user);
                $this->session->set_userdata('nama', $user[0]->nama);
                $this->session->set_userdata('username', $user[0]->username);
                $this->session->set_userdata('email', $user[0]->email);
                $this->session->set_userdata('password', $user[0]->password);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-block"><button type="button" class="close" data-dismiss="alert">×</button><p>Username atau Password salah! Silahkan diulangi lagi.</p></div>');
                redirect(site_url('/'), 'refresh');
            }
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-block"><button type="button" class="close" data-dismiss="alert">×</button><p>Username dan Password wajib diisi! Silahkan diulangi lagi.</p></div>');
            redirect(site_url('/'), 'refresh');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('password');
        redirect('/');
    }
}
