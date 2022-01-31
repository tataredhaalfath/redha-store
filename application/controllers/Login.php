<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Login Administrator';
        //validasi
        $this->form_validation->set_rules('username', 'Username', 'required', [
            'required' => '%s harus diisi'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required' => '%s harus diisi'
        ]);
        if ($this->form_validation->run() == false) {

            $this->load->view('login/list', $data);
        } else {

            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->simple_login->login($username, $password);
        }
    }

    public function logout()
    {
        $this->simple_login->logout();
    }
}
