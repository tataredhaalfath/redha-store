<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekening extends CI_Controller
{
    //load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('rekening_model');
        //proteksi halaman
        $this->simple_login->cek_login();
    }
    //data rekening
    public function index()
    {
        $rekening = $this->rekening_model->listing();
        $data = array(
            'title' => 'Data Rekening ',
            'rekening' => $rekening,
            'isi' => 'admin/rekening/list'
        );
        $this->load->view('admin/layout/wrapper', $data);
    }
    //tambah rekening
    public function tambah()
    {
        //validasi input
        $valid = $this->form_validation;
        $valid->set_rules('nama_bank', 'Nama Bank', 'required', [
            'required' => '%s harus diisi!',

        ]);
        $valid->set_rules('nomor_rekening', 'Nomor Rekening', 'required|is_unique[rekening.nomor_rekening]', [
            'required' => '%s harus diisi!',
            'is_unique' => '$s sudah ada. buat nomor rekening baru!'
        ]);
        $valid->set_rules('nama_pemilik', 'Nama Pemilik', 'required', [
            'required' => '%s harus diisi!',

        ]);
        if ($valid->run() == false) {
            $data = array(
                'title' => 'Tambah Rekening ',
                'isi' => 'admin/rekening/tambah'
            );
            $this->load->view('admin/layout/wrapper', $data);
        } else {
            //masuk database
            $i = $this->input;
            $data = [
                'nama_bank' => htmlspecialchars($i->post('nama_bank')),
                'nomor_rekening' => htmlspecialchars($i->post('nomor_rekening')),
                'nama_pemilik' => htmlspecialchars($i->post('nama_pemilik'))


            ];
            $this->rekening_model->tambah($data);
            $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">
                Data telah ditambah!
            </div>');
            redirect(base_url('admin/rekening'));
        }
    }
    public function delete($id_rekening)
    {
        $data = [
            'id_rekening' => $id_rekening
        ];
        $this->rekening_model->delete($data);
        $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">
                Data berhasil dihapus!
            </div>');
        redirect(base_url('admin/rekening'));
    }
    //edit rekening
    public function edit($id_rekening)
    {
        $rekening = $this->rekening_model->detail($id_rekening);

        //validasi input
        $valid = $this->form_validation;
        $valid->set_rules('nama_bank', 'Nama Rekening', 'required', [
            'required' => '%s harus diisi!'
        ]);



        if ($valid->run() == false) {
            $data = array(
                'title' => 'Edit Rekening ',
                'rekening' => $rekening,
                'isi' => 'admin/rekening/edit'
            );
            $this->load->view('admin/layout/wrapper', $data);
        } else {
            //masuk database
            $i = $this->input;
            $data = [
                'nama_bank' => htmlspecialchars($i->post('nama_bank')),
                'nomor_rekening' => htmlspecialchars($i->post('nomor_rekening')),
                'nama_pemilik' => htmlspecialchars($i->post('nama_pemilik'))

            ];
            $this->rekening_model->edit($data);
            $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">
                Data telah diedit!
            </div>');
            redirect(base_url('admin/rekening'));
        }
    }
}
