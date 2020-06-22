<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Seminar_api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('kelompok_model','seminar_model'));
        $this->load->library('basic_auth');
    }

    public function add_seminar()
    {
        $data = (array)json_decode(file_get_contents('php://input'));
        $this->seminar_model->add_seminar($data);
        $id = $this->seminar_model->last_id();
        $this->kelompok_model->edit_seminar($id, $data['nim1']);
        if (!empty($data['nim2'])) {
            $this->kelompok_model->edit_seminar($id, $data['nim2']);
        }
        $this->output
          ->set_status_header(201)
          ->set_output('Data Seminar berhasil ditambahkan')
          ->_display();
        exit;
    }

    public function get_seminar()
    {
        $response = array(
          'data' => $this->seminar_model->get_all_seminar(),
          'jumlah' => $this->seminar_model->jumlah_seminar()
        );
        $this->output
          ->set_status_header(200)
          ->set_content_type('application/json', 'utf-8')
          ->set_output(json_encode($response, JSON_PRETTY_PRINT))
          ->_display();
        exit;
    }

    public function edit_seminar($id)
    {
        $data = (array)json_decode(file_get_contents('php://input'));
        $this->seminar_model->edit_seminar($id, $data);
        $this->output
          ->set_status_header(200)
          ->set_output('Data Seminar berhasil diubah')
          ->_display();
        exit;
    }

    public function delete_seminar($id)
    {
        $this->kelompok_model->set_null_seminar($id);
        $this->seminar_model->delete_seminar($id); 
        $this->output
          ->set_status_header(200)
          ->set_output('Data Seminar berhasil dihapus')
          ->_display();
        exit;
    }
}
