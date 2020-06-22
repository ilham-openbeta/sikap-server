<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('basic_auth');
    }

    public function ubah_pass()
    {
      $data = (array)json_decode(file_get_contents('php://input'));
      $this->user_model->reset_admin($_SERVER['PHP_AUTH_USER'], $data['password']);
      $this->output
        ->set_status_header(200)
        ->set_output('Password berhasil diubah')
        ->_display();
      exit;
    }
}
