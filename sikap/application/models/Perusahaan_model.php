<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perusahaan_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function add_perusahaan($nama,$alamat,$kontak)
    {
        $data = array(
          'nama' => $nama,
          'alamat' => $alamat,
          'kontak' => $kontak
        );
        return $this->db->insert('perusahaan', $data);
    }

    public function get_perusahaan($id)
    {
        $query = $this->db->get_where('perusahaan', array('id' => $id));
        return $query->row_array();
    }

    public function last_id()
    {
        return $this->db->insert_id();
    }

    public function edit_perusahaan($id, $data_perusahaan)
    {
        $data = array(
          'nama' => $data_perusahaan['nama'],
          'alamat' => $data_perusahaan['alamat'],
          'kontak' => $data_perusahaan['kontak']
        );
        return $this->db->update('perusahaan', $data, array('id' => $id));
    }

    public function delete_perusahaan($id)
    {
        return $this->db->delete('perusahaan', array('id' => $id));
    }
}
