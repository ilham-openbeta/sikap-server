<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kp_api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kp_model');
        $this->load->library('basic_auth');
    }

    public function get_kp()
    {
        $response = array(
          'data' => $this->kp_model->get_all_kp(),
          'jumlah' => $this->kp_model->jumlah_kp()
        );
        $this->output
          ->set_status_header(200)
          ->set_content_type('application/json', 'utf-8')
          ->set_output(json_encode($response, JSON_PRETTY_PRINT))
          ->_display();
        exit;
    }

    public function edit_kp($id)
    {
        $data = (array)json_decode(file_get_contents('php://input'));
        $this->kp_model->edit_kp($id, $data);
        $this->output
          ->set_status_header(200)
          ->set_output('Data Kerja Praktek berhasil diubah')
          ->_display();
        exit;
    }

    public function delete_kp($id)
    {
        $this->kp_model->delete_kp($id);
        $this->output
          ->set_status_header(200)
          ->set_output('Data Kerja Praktek berhasil dihapus')
          ->_display();
        exit;
    }
}
