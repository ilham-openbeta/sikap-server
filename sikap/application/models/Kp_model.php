<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kp_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function add_kp($id, $tgl_mulai, $tgl_selesai)
    {
        $data = array(
          'id_perusahaan' => $id,
          'tanggal_mulai' => $tgl_mulai,
          'tanggal_selesai' => $tgl_selesai
        );
        return $this->db->insert('kerja_praktek', $data);
    }

    public function get_kp($id)
    {
        $query = $this->db->get_where('kerja_praktek', array('id' => $id));
        return $query->row_array();
    }

    public function last_id()
    {
        return $this->db->insert_id();
    }

    public function get_all_kp()
    {
        $this->db->select(
         'kerja_praktek.id,
          mahasiswa.nim,
          mahasiswa.nama,
          mahasiswa.jurusan,
          perusahaan.nama AS perusahaan,
          perusahaan.alamat,
          perusahaan.kontak,
          kerja_praktek.tanggal_mulai,
          kerja_praktek.tanggal_selesai,
          kerja_praktek.status,
          dosen.nip,
          dosen.nama AS dosen,
          seminar.tanggal,
          kerja_praktek.no_surat,
          kerja_praktek.tanggal_surat,
          kerja_praktek.tanggal_diubah'
        );
        $this->db->join('kelompok', 'kelompok.id_kerja_praktek=kerja_praktek.id');
        $this->db->join('mahasiswa', 'mahasiswa.nim=kelompok.nim');
        $this->db->join('perusahaan', 'perusahaan.id=kerja_praktek.id_perusahaan');
        $this->db->join('seminar', 'seminar.id=kelompok.id_seminar', 'LEFT');
        $this->db->join('dosen', 'dosen.nip=kerja_praktek.nip_dosen', 'LEFT');
        $query = $this->db->get('kerja_praktek');
        return $query->result_array();
    }

    public function daftar_mhs($nip)
    {
        $this->db->select(
          'kerja_praktek.id,
           group_concat(mahasiswa.nama SEPARATOR "<br />- ") AS mahasiswa,
           mahasiswa.jurusan,
           perusahaan.nama AS perusahaan,
           perusahaan.alamat,
           perusahaan.kontak,
           kerja_praktek.tanggal_mulai,
           kerja_praktek.tanggal_selesai,
           kerja_praktek.status'
        );
        $this->db->join('kelompok', 'kelompok.id_kerja_praktek=kerja_praktek.id');
        $this->db->join('mahasiswa', 'mahasiswa.nim=kelompok.nim');
        $this->db->join('perusahaan', 'perusahaan.id=kerja_praktek.id_perusahaan');
        $this->db->group_by('kerja_praktek.id');
        $query = $this->db->get_where('kerja_praktek', array('nip_dosen' => $nip));
        return $query->result_array();
    }

    public function jumlah_kp()
    {
        return $this->db->count_all_results('kerja_praktek', false);
    }

    public function edit_kp($id, $data_kp)
    {
        if(empty($data_kp['nip'])){
          $data_kp['nip'] = null;
        }
        if(empty($data_kp['no_surat'])){
          $data_kp['no_surat'] = null;
        }
        $data = array(
          'nip_dosen' => $data_kp['nip'],
          'status' => $data_kp['status'],
          'no_surat' => $data_kp['no_surat']
        );
        return $this->db->update('kerja_praktek', $data, array('id' => $id));
    }

    public function delete_kp($id)
    {
        $path = FCPATH.'/file-lampiran/'.$id.'.pdf';
        if (file_exists($path)) {
            unlink($path);
        }
        return $this->db->delete('kerja_praktek', array('id' => $id));
    }
}
