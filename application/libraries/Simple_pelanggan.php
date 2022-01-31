<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Simple_pelanggan
{
    protected $CI;
    public function __construct()
    {
        $this->CI = &get_instance();
        //load data model user 
        $this->CI->load->model('pelanggan_model');
    }

    //fungsi login

    public function login($email, $password)
    {

        $check = $this->CI->pelanggan_model->login($email, $password);

        if ($check) {

            //juka ada data user, maka create session login
            $id_pelanggan = $check['id_pelanggan'];
            $nama_pelanggan = $check['nama_pelanggan'];

            //create session
            $this->CI->session->set_userdata([
                'id_pelanggan' => $id_pelanggan,
                'nama_pelanggan' => $nama_pelanggan,
                'email' => $email

            ]);
            //redirek kehalaman admin yang di proteksi
            redirect(base_url('dashboard'));
        } else {
            //jika tidak ada /username,password salah maka suruh login lagi
            $this->CI->session->set_flashdata('warning', '<div class="alert alert-danger" role="alert">
            Username / Password Salah!
        </div>');
            redirect(base_url('masuk'));
        }
    }

    //fungsi cek login
    public function cek_login()
    {
        //memeriksa apakah session sudah ada atau belum. jika belum redirek kelogin
        if (!$this->CI->session->userdata('email')) {
            $this->CI->session->set_flashdata('warning', '<div class="alert alert-warning" role="alert">
            Anda Belum Login!
        </div>');
            redirect(base_url('masuk'));
        }
    }

    //fungsi logout 
    public function logout()
    {
        $this->CI->session->unset_userdata([
            'id_pelanggan',
            'nama_pelanggan',
            'email'
        ]);
        $this->CI->session->set_userdata(['home' => 'home']);
        $this->CI->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">
            Anda berhasil logout!
        </div>');
        redirect(base_url('registrasi'));
    }
}
