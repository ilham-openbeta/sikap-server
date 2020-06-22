<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('kp_model','user_model'));
        $this->load->helper(array('url','form','html'));
        $this->load->library(array('session','form_validation'));
        if ((!isset($_SESSION['role'])) || ($_SESSION['role']!='dosen')) {
            redirect(base_url());
        }
    }

    public function daftar_mahasiswa()
    {
        $data['list'] = $this->kp_model->daftar_mhs($_SESSION['user']);
        $this->load->view('daftar_mahasiswa', $data);
    }

    public function ubah_pass(){
      $data['pesan'] = '';
      $this->form_validation->set_rules('passlama', 'Password Lama', 'required');
      $this->form_validation->set_rules('passbaru1', 'Password Baru', 'required');
      $this->form_validation->set_rules('passbaru2', 'Verifikasi Password', 'required|matches[passbaru1]');
      if ($this->form_validation->run() === false) {
          $this->load->view('ubahpass2', $data);
      } else {
            $data['pesan'] = '<span style="color:lime">Sukses Mengubah Password</span><br />';
            $this->user_model->reset_dosen($_SESSION['user'],$_POST['passbaru1']);
            $this->load->view('ubahpass2', $data);
      }
    }
}
