<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AgamaModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getData($periode)
    {
        $this->db->select('*');
        $this->db->from('agama');
        $this->db->join('kecamatan', 'kecamatan.id_kecamatan = agama.kecamatan_id');
        $this->db->order_by('kecamatan_id', 'ASC');
        if (!empty($periode)) {
            $this->db->where('periode', $periode);
        }
        return $this->db->get()->result();
    }

    public function getTotal($id)
    {
        $this->db->select('*');
        $this->db->from('agama');
        $this->db->join('kecamatan', 'kecamatan.id_kecamatan = agama.kecamatan_id');
        return $this->db->where('id_agama', $id)->get()->result();
    }

    public function getKecamatan()
    {
        return $this->db->get('kecamatan')->result();
    }

    public function getJumlahIslam()
    {
        $this->db->select_sum('islam');
        return $this->db->get('agama')->result();
    }

    public function getJumlahKristen()
    {
        $this->db->select_sum('kristen');
        return $this->db->get('agama')->result();
    }

    public function getJumlahKatholik()
    {
        $this->db->select_sum('katholik');
        return $this->db->get('agama')->result();
    }

    public function getJumlahHindu()
    {
        $this->db->select_sum('hindu');
        return $this->db->get('agama')->result();
    }

    public function getJumlahBuddha()
    {
        $this->db->select_sum('buddha');
        return $this->db->get('agama')->result();
    }

    public function getJumlahKonghucu()
    {
        $this->db->select_sum('konghucu');
        return $this->db->get('agama')->result();
    }

    public function getJumlahKepercayaan()
    {
        $this->db->select_sum('penghayat_kepercayaan');
        return $this->db->get('agama')->result();
    }

    public function insert($data)
    {
        return $this->db->insert('agama', $data);
    }

    public function insert_batch($data)
    {
        $this->db->insert_batch('agama', $data);
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function update($id, $data)
    {
        $this->db->where('id_agama', $id);
        return $this->db->update('agama', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('agama', array('id_agama' => $id));
    }
}
