<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function add_mahasiswa($data_mhs)
    {
        $data = array(
          'nim' => $data_mhs['nim'],
          'nama' => $data_mhs['nama'],
          'tanggal_lahir' => $data_mhs['tanggal_lahir'],
          'jenis_kelamin' => $data_mhs['jenis_kelamin'],
          'asal' => $data_mhs['asal'],
          'jurusan' => $data_mhs['jurusan'],
          'angkatan' => $data_mhs['angkatan'],
          'no_hp' => $data_mhs['no_hp']
        );
        return $this->db->insert('mahasiswa', $data);
    }

    public function get_mahasiswa($nim)
    {
        $query = $this->db->get_where('mahasiswa', array('nim' => $nim));
        return $query->row_array();
    }

    public function get_all_mahasiswa()
    {
        $query = $this->db->get('mahasiswa');
        return $query->result_array();
    }

    public function jumlah_mahasiswa()
    {
        return $this->db->count_all_results('mahasiswa', false);
    }

    public function edit_mahasiswa($nim, $data_mhs)
    {
        $data = array(
          'nama' => $data_mhs['nama'],
          'tanggal_lahir' => $data_mhs['tanggal_lahir'],
          'jenis_kelamin' => $data_mhs['jenis_kelamin'],
          'asal' => $data_mhs['asal'],
          'jurusan' => $data_mhs['jurusan'],
          'angkatan' => $data_mhs['angkatan'],
          'no_hp' => $data_mhs['no_hp']
        );
        return $this->db->update('mahasiswa', $data, array('nim' => $nim));
    }

    public function delete_mahasiswa($nim)
    {
        return $this->db->delete('mahasiswa', array('nim' => $nim));
    }

}
