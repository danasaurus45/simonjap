<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UmurModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getData($periode)
    {
        $this->db->select('*');
        $this->db->from('umur');
        $this->db->join('kecamatan', 'kecamatan.id_kecamatan = umur.kecamatan_id');
        $this->db->order_by('kecamatan_id', 'ASC');
        if (!empty($periode)) {
            $this->db->where('periode', $periode);
        }
        return $this->db->get()->result();
    }

    public function getTotal($id)
    {
        $this->db->select('*');
        $this->db->from('umur');
        $this->db->join('kecamatan', 'kecamatan.id_kecamatan = umur.kecamatan_id');
        return $this->db->where('id_umur', $id)->get()->result();
    }

    public function getKecamatan()
    {
        return $this->db->get('kecamatan')->result();
    }

    public function getJumlahUmur($param)
    {
        $this->db->select_sum($param);
        return $this->db->get('umur')->result();
    }

    public function insert($data)
    {
        return $this->db->insert('umur', $data);
    }

    public function insert_batch($data)
    {
        $this->db->insert_batch('umur', $data);
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function update($id, $data)
    {
        $this->db->where('id_umur', $id);
        return $this->db->update('umur', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('umur', array('id_umur' => $id));
    }
}
