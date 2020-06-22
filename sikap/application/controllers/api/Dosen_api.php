<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen_api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('user_model','dosen_model'));
        $this->load->library('basic_auth');
    }

    public function add_dosen()
    {
        $data = (array)json_decode(file_get_contents('php://input'));
        $this->dosen_model->add_dosen($data);
        $this->user_model->add_dosen($data['nip']);
        $this->output
          ->set_status_header(201)
          ->set_output('Data Dosen berhasil ditambahkan')
          ->_display();
        exit;
    }

    public function get_dosen()
    {
        $response = array(
          'data' => $this->dosen_model->get_all_dosen(),
          'jumlah' => $this->dosen_model->jumlah_dosen()
        );
        $this->output
          ->set_status_header(200)
          ->set_content_type('application/json', 'utf-8')
          ->set_output(json_encode($response, JSON_PRETTY_PRINT))
          ->_display();
        exit;
    }

    public function edit_dosen($nip)
    {
        $data = (array)json_decode(file_get_contents('php://input'));
        $this->dosen_model->edit_dosen($nip, $data);
        $this->output
          ->set_status_header(200)
          ->set_output('Data Dosen berhasil diubah')
          ->_display();
        exit;
    }

    public function delete_dosen($nip)
    {
        $this->dosen_model->delete_dosen($nip);
        $this->user_model->delete_dosen($nip);
        $this->output
          ->set_status_header(200)
          ->set_output('Data Dosen berhasil dihapus')
          ->_display();
        exit;
    }
}
