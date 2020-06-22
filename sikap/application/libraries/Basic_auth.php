<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Basic_auth
{
    public function __construct()
    {
        $this->CI =& get_instance();
        $user = $_SERVER['PHP_AUTH_USER'];
        $pass = $_SERVER['PHP_AUTH_PW'];
        if (!empty($user)&&!empty($pass)) {
            $this->CI->load->model('user_model');
            $data_user = $this->CI->user_model->get_admin($user);
            if (!empty($data_user)) {
                if ($data_user['role'] == 'admin') {
                    $check = password_verify($pass, $data_user['password']);
                    if ($check) {
                        return;
                    }
                }
            }
        }
        $this->CI->output
              ->set_status_header(401)
              ->set_header('WWW-Authenticate: Basic realm="Sistem Informasi Kerja Praktek"')
              ->set_output('<h1>401 Unauthorized</h1>')
              ->_display();
        exit;
    }
}
