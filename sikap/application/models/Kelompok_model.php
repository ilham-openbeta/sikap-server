<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelompok_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function add_kelompok($id, $nim)
    {
        $data = array(
          'id_kerja_praktek' => $id,
          'nim' => $nim
        );
        return $this->db->insert('kelompok', $data);
    }

    public function last_id()
    {
        return $this->db->insert_id();
    }

    public function edit_seminar($id, $nim)
    {
        return $this->db->update('kelompok', array('id_seminar' => $id), array('nim' => $nim));
    }

    public function set_null_seminar($id)
    {
        return $this->db->update('kelompok', array('id_seminar' => null), array('id_seminar' => $id));
    }

    public function get_kelompok($id)
    {
        $query = $this->db->get_where('kelompok', array('id_kerja_praktek' => $id));
        return $query->result_array();
    }

    public function get_id($nim)
    {
        $query = $this->db->get_where('kelompok', array('nim' => $nim));
        return $query->row_array();
    }

    public function get_status($id)
    {
        $this->db->select(
         'group_concat(mahasiswa.nama SEPARATOR "<br />") AS mahasiswa,
          perusahaan.nama,
          perusahaan.alamat,
          perusahaan.kontak,
          kerja_praktek.tanggal_mulai,
          kerja_praktek.tanggal_selesai,
          kerja_praktek.status,
          dosen.nama AS dosen,
          kerja_praktek.tanggal_diubah'
        );
        $this->db->join('mahasiswa', 'mahasiswa.nim=kelompok.nim');
        $this->db->join('kerja_praktek', 'kerja_praktek.id=kelompok.id_kerja_praktek');
        $this->db->join('perusahaan', 'perusahaan.id=kerja_praktek.id_perusahaan');
        $this->db->join('dosen', 'dosen.nip=kerja_praktek.nip_dosen', 'LEFT');
        $this->db->group_by('kerja_praktek.id');
        $query = $this->db->get_where('kelompok', array('id_kerja_praktek' => $id));
        return $query->row_array();
    }

    public function delete_kelompok($id)
    {
        return $this->db->delete('kelompok', array('id_kerja_praktek' => $id));
    }

    public function check_nim($nim)
    {
        $query = $this->db->get_where('kelompok', array('nim' => $nim));
        return $query->row_array();
    }
}
