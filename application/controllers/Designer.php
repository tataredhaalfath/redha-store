<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Designer extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('produk_model');
        $this->load->model('kategori_model');
    }

    //halaman utama website
    public function index()
    {
        $site = $this->konfigurasi_model->listing();
        $kategori = $this->konfigurasi_model->nav_produk();
        $produk = $this->produk_model->home();

        $data = array(
            'title' => $site['namaweb'],
            'isi'   =>  'designer/list',
            'keyword' => $site['keyword'],
            'deskripsi' => $site['deskripsi'],
            'kategori' => $kategori,
            'produk' => $produk
        );
        $this->load->view('layout/wrapper', $data);
    }
}
