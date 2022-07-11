<?php
defined('BASEPATH') or exit('No direct script access allowed');

class IdentitasModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getData($periode)
    {
        $this->db->select('*');
        $this->db->from('identitas');
        $this->db->join('kecamatan', 'kecamatan.id_kecamatan = identitas.kecamatan_id');
        $this->db->order_by('kecamatan_id', 'ASC');
        if (!empty($periode)) {
            $this->db->where('periode', $periode);
        }
        return $this->db->get()->result();
    }

    public function getTotal($id)
    {
        $this->db->select('*');
        $this->db->from('identitas');
        $this->db->join('kecamatan', 'kecamatan.id_kecamatan = identitas.kecamatan_id');
        return $this->db->where('id_identitas', $id)->get()->result();
    }

    public function getKecamatan()
    {
        return $this->db->get('kecamatan')->result();
    }

    public function getJumlahPunyaKTP()
    {
        $this->db->select_sum('punya_ktp');
        return $this->db->get('identitas')->result();
    }

    public function getJumlahWajibKTP()
    {
        $this->db->select_sum('total_wajib_ktp');
        return $this->db->get('identitas')->result();
    }

    public function getJumlahPunyaAkta()
    {
        $this->db->select_sum('punya_akta');
        return $this->db->get('identitas')->result();
    }

    public function getJumlahWajibAkta()
    {
        $this->db->select_sum('wajib_akta');
        return $this->db->get('identitas')->result();
    }

    public function insert($data)
    {
        return $this->db->insert('identitas', $data);
    }

    public function insert_batch($data)
    {
        $this->db->insert_batch('identitas', $data);
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function update($id, $data)
    {
        $this->db->where('id_identitas', $id);
        return $this->db->update('identitas', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('identitas', array('id_identitas' => $id));
    }
}
