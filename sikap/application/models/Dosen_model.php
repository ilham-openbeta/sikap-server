<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function add_dosen($data_dosen)
    {
        $data = array(
          'nip' => $data_dosen['nip'],
          'nama' => $data_dosen['nama'],
          'no_hp' => $data_dosen['no_hp']
        );
        return $this->db->insert('dosen', $data);
    }

    public function get_dosen($nip)
    {
        $query = $this->db->get_where('dosen', array('nip' => $nip));
        return $query->row_array();
    }

    public function get_all_dosen()
    {
        $query = $this->db->get('dosen');
        return $query->result_array();
    }

    public function jumlah_dosen()
    {
        return $this->db->count_all_results('dosen', false);
    }

    public function edit_dosen($nip, $data_dosen)
    {
        $data = array(
          'nama' => $data_dosen['nama'],
          'no_hp' => $data_dosen['no_hp']
        );
        return $this->db->update('dosen', $data, array('nip' => $nip));
    }

    public function delete_dosen($nip)
    {
        return $this->db->delete('dosen', array('nip' => $nip));
    }
}
