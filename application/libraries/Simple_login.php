<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Simple_login
{
    protected $CI;
    public function __construct()
    {
        $this->CI = &get_instance();
        //load data model user 
        $this->CI->load->model('user_model');
    }

    //fungsi login 

    public function login($username, $password)
    {

        $check = $this->CI->user_model->login($username, $password);

        if ($check) {
            //juka ada data user, maka create session login
            $id_user = $check['id_user'];
            $nama = $check['nama'];
            $username = $check['username'];
            $gambar = $check['gambar'];
            $akses_level = $check['akses_level'];


            //create session
            $this->CI->session->set_userdata([
                'id_user' => $id_user,
                'nama' => $nama,
                'username' => $username,
                'gambar' => $gambar,
                'akses_level' => $akses_level

            ]);
            //redirek kehalaman admin yang di proteksi
            redirect(base_url('admin/dashboard'));
        } else {
            //jika tidak ada /username,password salah maka suruh login lagi
            $this->CI->session->set_flashdata('warning', '<div class="alert alert-danger" role="alert">
            Username / Password Salah!
        </div>');
            redirect(base_url('login'));
        }
    }

    //fungsi cek login
    public function cek_login()
    {
        //memeriksa apakah session sudah ada atau belum. jika belum redirek kelogin
        if (!$this->CI->session->userdata('username')) {
            $this->CI->session->set_flashdata('warning', '<div class="alert alert-warning" role="alert">
            Anda Belum Login!
        </div>');
            redirect(base_url('login'));
        }
    }

    //fungsi logout
    public function logout()
    {
        $this->CI->session->unset_userdata([
            'id_user',
            'nama',
            'username',
            'akses_level'
        ]);

        $this->CI->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">
            Anda berhasil logout!
        </div>');
        redirect(base_url('login'));
    }
}
