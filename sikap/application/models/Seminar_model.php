<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Seminar_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function add_seminar($data_seminar)
    {
        $data = array(
          'judul' => $data_seminar['judul'],
          'tanggal' => $data_seminar['tanggal']
        );
        return $this->db->insert('seminar', $data);
    }

    public function get_all_seminar()
    {
        $this->db->select('seminar.id, mahasiswa.nama, perusahaan.nama AS perusahaan, seminar.judul, seminar.tanggal');
        $this->db->join('kelompok', 'kelompok.id_seminar=seminar.id');
        $this->db->join('mahasiswa', 'mahasiswa.nim=kelompok.nim');
        $this->db->join('kerja_praktek', 'kerja_praktek.id=kelompok.id_kerja_praktek');
        $this->db->join('perusahaan', 'perusahaan.id=kerja_praktek.id_perusahaan');
        $query = $this->db->get('seminar');
        return $query->result_array();
    }

    public function last_id()
    {
        return $this->db->insert_id();
    }

    public function jumlah_seminar()
    {
        return $this->db->count_all_results('seminar', false);
    }

    public function get_seminar($id)
    {
        $query = $this->db->get_where('seminar', array('id' => $id));
        return $query->row_array();
    }

    public function edit_seminar($id, $data_seminar)
    {
        $data = array(
          'judul' => $data_seminar['judul'],
          'tanggal' => $data_seminar['tanggal']
        );
        return $this->db->update('seminar', $data, array('id' => $id));
    }

    public function delete_seminar($id)
    {
        return $this->db->delete('seminar', array('id' => $id));
    }
}
