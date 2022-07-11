<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KkModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getData($periode)
    {
        $this->db->select('*');
        $this->db->from('total_kk');
        $this->db->join('kecamatan', 'kecamatan.id_kecamatan = total_kk.kecamatan_id');
        $this->db->order_by('kecamatan_id', 'ASC');
        if (!empty($periode)) {
            $this->db->where('periode', $periode);
        }
        return $this->db->get()->result();
    }

    public function getTotal($id)
    {
        $this->db->select('*');
        $this->db->from('total_kk');
        $this->db->join('kecamatan', 'kecamatan.id_kecamatan = total_kk.kecamatan_id');
        return $this->db->where('id_totalkk', $id)->get()->result();
    }

    public function getKecamatan()
    {
        return $this->db->get('kecamatan')->result();
    }

    public function getJumlah()
    {
        $this->db->select_sum('jumlah_kk');
        return $this->db->get('total_kk')->result();
    }

    public function insert($data)
    {
        return $this->db->insert('total_kk', $data);
    }

    public function insert_batch($data)
    {
        $this->db->insert_batch('total_kk', $data);
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function update($id, $data)
    {
        $this->db->where('id_totalkk', $id);
        return $this->db->update('total_kk', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('total_kk', array('id_totalkk' => $id));
    }
}
