<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function add_dosen($nip)
    {
        $pass = password_hash($nip, PASSWORD_BCRYPT);
        $data = array(
          'user_dosen' => $nip,
          'password' => $pass,
          'role' => 'dosen'
        );
        return $this->db->insert('user', $data);
    }

    public function add_mahasiswa($nim)
    {
        $pass = password_hash($nim, PASSWORD_BCRYPT);
        $data = array(
          'user_mahasiswa' => $nim,
          'password' => $pass,
          'role' => 'mahasiswa'
        );
        return $this->db->insert('user', $data);
    }

    public function get_user($user)
    {
        $this->db->where('user_dosen', $user);
        $this->db->or_where('user_mahasiswa', $user);
        $query = $this->db->get('user');
        return $query->row_array();
    }

    public function get_admin($user)
    {
        $query = $this->db->get_where('user', array('user_admin' => $user));
        return $query->row_array();
    }

    public function reset_admin($user, $pass1)
    {
        $pass2 = password_hash($pass1, PASSWORD_BCRYPT);
        return $this->db->update('user', array('password' => $pass2), array('user_admin' => $user));
    }

    public function reset_dosen($user, $pass1)
    {
        $pass2 = password_hash($pass1, PASSWORD_BCRYPT);
        return $this->db->update('user', array('password' => $pass2), array('user_dosen' => $user));
    }

    public function reset_mahasiswa($user, $pass1)
    {
        $pass2 = password_hash($pass1, PASSWORD_BCRYPT);
        return $this->db->update('user', array('password' => $pass2), array('user_mahasiswa' => $user));
    }

    public function delete_dosen($user)
    {
        return $this->db->delete('user', array('user_dosen' => $user));
    }

    public function delete_mahasiswa($user)
    {
        return $this->db->delete('user', array('user_mahasiswa' => $user));
    }
}
