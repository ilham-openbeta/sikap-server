<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper(array('url','form','html'));
        $this->load->library(array('session','form_validation'));
    }

    public function index()
    {
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] == 'dosen') {
                $this->dosen();
            } else {
                $this->mahasiswa();
            }
        } else {
            $this->login();
        }
    }

    private function login()
    {
        $data['pesan'] = '';
        $this->form_validation->set_error_delimiters('<div style="color:red">', '</div>');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() === false) {
            $this->load->view('login', $data);
        } else {
            $user = $this->input->post('username');
            $data_user = $this->user_model->get_user($user);
            if (empty($data_user)) {
                $data['pesan'] = '<div style="color:red">Username atau password salah!</div>';
                $this->load->view('login', $data);
            } else {
                $pass = $this->input->post('password');
                $check = password_verify($pass, $data_user['password']);
                if ($check) {
                    $_SESSION['user'] = $user;
                    $_SESSION['role'] = $data_user['role'];
                    redirect(base_url());
                } else {
                    $data['pesan'] = '<div style="color:red">Username atau password salah!</div>';
                    $this->load->view('login', $data);
                }
            }
        }
    }

    public function logout()
    {
        if (isset($_SESSION['user'])) {
            session_destroy();
        }
        redirect(base_url());
    }

    private function dosen(){
      $this->load->view('beranda2');
    }

    private function mahasiswa(){
      $this->load->view('beranda');
    }

}
