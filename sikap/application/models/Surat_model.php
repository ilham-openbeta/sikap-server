<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function add_surat($data_surat)
    {
        $data = array(
          'nim' => $data_surat['nim'],
          'no_surat' => $data_surat['no_surat']
        );
        return $this->db->insert('surat_tugas', $data);
    }

    public function jumlah_surat()
    {
        return $this->db->count_all_results('surat_tugas', false);
    }

    public function get_all_surat()
    {
        $this->db->select(
         'surat_tugas.no_surat,
          surat_tugas.tanggal_surat,
          mahasiswa.nim,
          mahasiswa.nama,
          mahasiswa.tanggal_lahir,
          mahasiswa.jurusan,
          mahasiswa.asal,
          dosen.nip,
          dosen.nama AS dosen,
          perusahaan.nama AS perusahaan,
          kerja_praktek.tanggal_mulai,
          kerja_praktek.tanggal_selesai'
        );
        $this->db->join('mahasiswa', 'mahasiswa.nim=surat_tugas.nim');
        $this->db->join('kelompok', 'kelompok.nim=mahasiswa.nim');
        $this->db->join('kerja_praktek', 'kerja_praktek.id=kelompok.id_kerja_praktek');
        $this->db->join('perusahaan', 'perusahaan.id=kerja_praktek.id_perusahaan');
        $this->db->join('dosen', 'dosen.nip=kerja_praktek.nip_dosen', 'LEFT');
        $query = $this->db->get('surat_tugas');
        return $query->result_array();
    }

    public function delete_surat($nim)
    {
        return $this->db->delete('surat_tugas', array('nim' => $nim));
    }
}
