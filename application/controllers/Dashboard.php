<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('UsersModel', 'data_user');
        $this->load->model('PendudukModel', 'data_penduduk');
        $this->load->model('AgamaModel', 'data_agama');
        $this->load->model('UmurModel', 'data_umur');
        $this->load->model('KkModel', 'data_kk');
        $this->load->model('IdentitasModel', 'data_identitas');
    }
    
    public function index() {
        $data['user'] = $this->data_user->getData();
        $data['total'] = $this->data_penduduk->getJumlah();
        $data['lahir'] = $this->data_penduduk->getJumlahLahir();
        $data['mati'] = $this->data_penduduk->getJumlahMati();
        $data['pindah'] = $this->data_penduduk->getJumlahPindah();
        $data['pendatang'] = $this->data_penduduk->getJumlahPendatang();
        $data['jumlah_kk'] = $this->data_kk->getJumlah();
        $data['islam'] = $this->data_agama->getJumlahIslam();
        $data['kristen'] = $this->data_agama->getJumlahKristen();
        $data['katholik'] = $this->data_agama->getJumlahKatholik();
        $data['hindu'] = $this->data_agama->getJumlahHindu();
        $data['buddha'] = $this->data_agama->getJumlahBuddha();
        $data['konghucu'] = $this->data_agama->getJumlahKonghucu();
        $data['kepercayaan'] = $this->data_agama->getJumlahKepercayaan();
        $data['umur0_4'] = $this->data_umur->getJumlahUmur('umur0_4');
        $data['umur5_9'] = $this->data_umur->getJumlahUmur('umur5_9');
        $data['umur10_14'] = $this->data_umur->getJumlahUmur('umur10_14');
        $data['umur15_19'] = $this->data_umur->getJumlahUmur('umur15_19');
        $data['umur20_24'] = $this->data_umur->getJumlahUmur('umur20_24');
        $data['umur25_29'] = $this->data_umur->getJumlahUmur('umur25_29');
        $data['umur30_34'] = $this->data_umur->getJumlahUmur('umur30_34');
        $data['umur35_39'] = $this->data_umur->getJumlahUmur('umur35_39');
        $data['umur40_44'] = $this->data_umur->getJumlahUmur('umur40_44');
        $data['umur45_49'] = $this->data_umur->getJumlahUmur('umur45_49');
        $data['umur50_54'] = $this->data_umur->getJumlahUmur('umur50_54');
        $data['umur55_59'] = $this->data_umur->getJumlahUmur('umur55_59');
        $data['umur60_64'] = $this->data_umur->getJumlahUmur('umur60_64');
        $data['umur65_atas'] = $this->data_umur->getJumlahUmur('umur65_atas');
        $data['wajib_akta'] = $this->data_identitas->getJumlahWajibAkta();
        $data['punya_akta'] = $this->data_identitas->getJumlahPunyaAkta();
        $data['wajib_ktp'] = $this->data_identitas->getJumlahWajibKTP();
        $data['punya_ktp'] = $this->data_identitas->getJumlahPunyaKTP();
        $this->load->view('pages/dashboard', $data);
     }
}