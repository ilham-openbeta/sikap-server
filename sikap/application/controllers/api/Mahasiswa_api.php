<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('user_model','mahasiswa_model'));
        $this->load->library('basic_auth');
    }

    public function add_mhs()
    {
        $data = (array)json_decode(file_get_contents('php://input'));
        $this->mahasiswa_model->add_mahasiswa($data);
        $this->user_model->add_mahasiswa($data['nim']);
        $this->output
          ->set_status_header(201)
          ->set_output('Data Mahasiswa berhasil ditambahkan')
          ->_display();
        exit;
    }

    public function get_mhs()
    {
        $response = array(
          'data' => $this->mahasiswa_model->get_all_mahasiswa(),
          'jumlah' => $this->mahasiswa_model->jumlah_mahasiswa()
        );
        $this->output
          ->set_status_header(200)
          ->set_content_type('application/json', 'utf-8')
          ->set_output(json_encode($response, JSON_PRETTY_PRINT))
          ->_display();
        exit;
    }

    public function edit_mhs($nim)
    {
        $data = (array)json_decode(file_get_contents('php://input'));
        $this->mahasiswa_model->edit_mahasiswa($nim, $data);
        $this->output
          ->set_status_header(200)
          ->set_output('Data Mahasiswa berhasil diubah')
          ->_display();
        exit;
    }

    public function delete_mhs($nim)
    {
        $this->mahasiswa_model->delete_mahasiswa($nim);
        $this->user_model->delete_mahasiswa($nim); 
        $this->output
          ->set_status_header(200)
          ->set_output('Data Mahasiswa berhasil dihapus')
          ->_display();
        exit;
    }
}
