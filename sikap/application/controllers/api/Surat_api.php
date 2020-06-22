<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('surat_model'));
        $this->load->library('basic_auth');
    }

    public function add_surat()
    {
        $data = (array)json_decode(file_get_contents('php://input'));
        $this->surat_model->add_surat($data);
        $this->output
          ->set_status_header(201)
          ->set_output('Data surat berhasil ditambahkan')
          ->_display();
        exit;
    }

    public function get_surat()
    {
        $response = array(
          'data' => $this->surat_model->get_all_surat(),
          'jumlah' => $this->surat_model->jumlah_surat()
        );
        $this->output
          ->set_status_header(200)
          ->set_content_type('application/json', 'utf-8')
          ->set_output(json_encode($response, JSON_PRETTY_PRINT))
          ->_display();
        exit;
    }

    public function delete_surat($nim)
    {
        $this->surat_model->delete_surat($nim);
        $this->output
          ->set_status_header(200)
          ->set_output('Data surat berhasil dihapus')
          ->_display();
        exit;
    }
}
