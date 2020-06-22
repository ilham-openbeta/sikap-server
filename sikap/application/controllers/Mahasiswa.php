<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url','form','html'));
        $this->load->library(array('session','form_validation'));
        $this->load->model(array('mahasiswa_model','kelompok_model','perusahaan_model','kp_model','user_model'));
        if ((!isset($_SESSION['role'])) || ($_SESSION['role']!='mahasiswa')) {
            redirect(base_url());
        }
    }

    public function profil()
    {
        $data = $this->mahasiswa_model->get_mahasiswa($_SESSION['user']);
        $this->load->view('profil', $data);
    }

    public function pengajuan()
    {
        $data['nim'] = $_SESSION['user'];
        $data['pesan'] = '';
        $cek = $this->kelompok_model->check_nim($_SESSION['user']);
        if (empty($cek)) {
            $this->form_validation->set_error_delimiters('<div style="color:red">', '</div>');
            $this->form_validation->set_rules('nim2', 'NIM 2', 'callback_cek_nim');
            $this->form_validation->set_rules('nim3', 'NIM 3', 'callback_cek_nim');
            $this->form_validation->set_rules('perusahaan', 'Nama Perusahaan', 'required');
            $this->form_validation->set_rules('alamat', 'Alamat Perusahaan', 'required');
            $this->form_validation->set_rules('kontak', 'Kontak Perusahaan', 'required');
            if ($this->form_validation->run() === false) {
                $this->load->view('formkp', $data);
            } else {
                $nim1 = $_SESSION['user'];
                $nim2 = $this->input->post('nim2');
                $nim3 = $this->input->post('nim3');
                $perusahaan = $this->input->post('perusahaan');
                $alamat = $this->input->post('alamat');
                $kontak = $this->input->post('kontak');
                $mulai = $_POST['thn1'].'-'.$_POST['bln1'].'-'.$_POST['tgl1'];
                $selesai = $_POST['thn2'].'-'.$_POST['bln2'].'-'.$_POST['tgl2'];
                $this->perusahaan_model->add_perusahaan($perusahaan, $alamat, $kontak);
                $idp = $this->perusahaan_model->last_id();
                $this->kp_model->add_kp($idp, $mulai, $selesai);
                $idk = $this->kp_model->last_id();
                $config['upload_path'] = './file-lampiran/';
                $config['allowed_types'] = 'pdf';
                $config['file_name'] = $idk;
                $config['max_size'] = 1024;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('lampiran')) {
                    $data['pesan'] = '<span style="color:red">Upload gagal</span><br />';
                    $this->kp_model->delete_kp($idk);
                    $this->perusahaan_model->delete_perusahaan($idp);
                    $this->load->view('formkp', $data);
                } else {
                    $this->kelompok_model->add_kelompok($idk, $nim1);
                    if (!empty($nim2)) {
                        $this->kelompok_model->add_kelompok($idk, $nim2);
                    }
                    if (!empty($nim3)) {
                        $this->kelompok_model->add_kelompok($idk, $nim3);
                    }
                    redirect(base_url('pengajuan'));
                }
            }
        } else {
            $idkp = $this->kelompok_model->get_id($_SESSION['user']);
            $data['status'] = $this->kelompok_model->get_status($idkp['id_kerja_praktek']);
            $this->load->view('status', $data);
        }
    }

    public function alur()
    {
        $this->load->view('alur');
    }

    public function kontak()
    {
        $this->load->view('kontak');
    }

    public function ubah_pass()
    {
        $data['pesan'] = '';
        $this->form_validation->set_error_delimiters('<div style="color:red">', '</div>');
        $this->form_validation->set_rules('passlama', 'Password Lama', 'required');
        $this->form_validation->set_rules('passbaru1', 'Password Baru', 'required');
        $this->form_validation->set_rules('passbaru2', 'Verifikasi Password', 'required|matches[passbaru1]');
        if ($this->form_validation->run() === false) {
            $this->load->view('ubahpass', $data);
        } else {
            $data['pesan'] = '<span style="color:lime">Sukses Mengubah Password</span><br />';
            $this->user_model->reset_mahasiswa($_SESSION['user'], $_POST['passbaru1']);
            $this->load->view('ubahpass', $data);
        }
    }

    public function cek_nim($val)
    {
        if (!empty($val) && empty($this->mahasiswa_model->get_mahasiswa($val))) {
            $this->form_validation->set_message('cek_nim', 'NIM salah');
            return false;
        } else {
            return true;
        }
    }
}
