<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PendudukModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getData($periode)
    {
        $this->db->select('*');
        $this->db->from('total_penduduk');
        $this->db->join('kecamatan', 'kecamatan.id_kecamatan = total_penduduk.kecamatan_id');
        $this->db->order_by('kecamatan_id', 'ASC');
        if (!empty($periode)) {
            $this->db->where('periode', $periode);
        }
        return $this->db->get()->result();
    }

    public function getTotal($id)
    {
        $this->db->select('*');
        $this->db->from('total_penduduk');
        $this->db->join('kecamatan', 'kecamatan.id_kecamatan = total_penduduk.kecamatan_id');
        return $this->db->where('id_total', $id)->get()->result();
    }

    public function getKecamatan()
    {
        return $this->db->get('kecamatan')->result();
    }

    public function getJumlah()
    {
        $this->db->select_sum('total');
        return $this->db->get('total_penduduk')->result();
    }

    public function getJumlahLahir()
    {
        $this->db->select_sum('lahir');
        return $this->db->get('total_penduduk')->result();
    }

    public function getJumlahMati()
    {
        $this->db->select_sum('mati');
        return $this->db->get('total_penduduk')->result();
    }

    public function getJumlahPindah()
    {
        $this->db->select_sum('pindah');
        return $this->db->get('total_penduduk')->result();
    }

    public function getJumlahPendatang()
    {
        $this->db->select_sum('pendatang');
        return $this->db->get('total_penduduk')->result();
    }


    public function insert($data)
    {
        return $this->db->insert('total_penduduk', $data);
    }

    public function insert_batch($data)
    {
        $this->db->insert_batch('total_penduduk', $data);
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function update($id, $data)
    {
        $this->db->where('id_total', $id);
        return $this->db->update('total_penduduk', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('total_penduduk', array('id_total' => $id));
    }
}
