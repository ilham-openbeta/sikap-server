<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test_auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('basic_auth');
    }

    public function check()
    {
        $this->output
          ->set_status_header(200)
          ->set_output('Login Sukses')
          ->_display();
        exit;
    }

}
