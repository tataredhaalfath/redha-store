<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ukuran extends CI_Controller
{
    //load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ukuran_model');
        //proteksi halaman
        $this->simple_login->cek_login();
    }
    //data ukuran
    public function index()
    {
        $ukuran = $this->ukuran_model->listing();
        $data = array(
            'title' => 'Data Ukuran Produk',
            'ukuran' => $ukuran,
            'isi' => 'admin/ukuran/list'
        );
        $this->load->view('admin/layout/wrapper', $data);
    }
    //tambah ukuran
    public function tambah()
    {
        //validasi input
        $valid = $this->form_validation;
        $valid->set_rules('nama_ukuran', 'Nama Ukuran', 'required|is_unique[ukuran.nama_ukuran]', [
            'required' => '%s harus diisi!',
            'is_unique' => '$s sudah ada. buat ukuran baru!'
        ]);

        if ($valid->run() == false) {
            $data = array(
                'title' => 'Tambah Ukuran Produk',
                'isi' => 'admin/ukuran/tambah'
            );
            $this->load->view('admin/layout/wrapper', $data);
        } else {
            //masuk database
            $i = $this->input;
            $slug_ukuran = url_title($this->input->post('nama_ukuran'), 'dash', TRUE);
            $data = [
                'slug_ukuran' => $slug_ukuran,
                'nama_ukuran' => htmlspecialchars($i->post('nama_ukuran')),
                'urutan' => htmlspecialchars($i->post('urutan'))


            ];
            $this->ukuran_model->tambah($data);
            $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">
                Data telah ditambah!
            </div>');
            redirect(base_url('admin/ukuran'));
        }
    }
    public function delete($id_ukuran)
    {
        $data = [
            'id_ukuran' => $id_ukuran
        ];
        $this->ukuran_model->delete($data);
        $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">
                Data berhasil dihapus!
            </div>');
        redirect(base_url('admin/ukuran'));
    }
    //edit ukuran
    public function edit($id_ukuran)
    {
        $ukuran = $this->ukuran_model->detail($id_ukuran);

        //validasi input
        $valid = $this->form_validation;
        $valid->set_rules('nama_ukuran', 'Nama Ukuran', 'required', [
            'required' => '%s harus diisi!'
        ]);



        if ($valid->run() == false) {
            $data = array(
                'title' => 'Edit Ukuran Produk',
                'ukuran' => $ukuran,
                'isi' => 'admin/ukuran/edit'
            );
            $this->load->view('admin/layout/wrapper', $data);
        } else {
            //masuk database
            $i = $this->input;
            $slug_ukuran = url_title($this->input->post('nama_ukuran'), 'dash', TRUE);
            $data = [
                'id_ukuran' => $id_ukuran,
                'slug_ukuran' => $slug_ukuran,
                'nama_ukuran' => htmlspecialchars($i->post('nama_ukuran')),
                'urutan' => htmlspecialchars($i->post('urutan'))

            ];
            $this->ukuran_model->edit($data);
            $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">
                Data telah diedit!
            </div>');
            redirect(base_url('admin/ukuran'));
        }
    }
}
