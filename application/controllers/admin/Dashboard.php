<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //proteksi halaman
        $this->simple_login->cek_login();
    }
    public function index()
    {
        $total = $this->dashboard_model->total_produk();
        $data = [
            'total' => $total
        ];
        $data['title'] = 'Halaman Administrator';
        $data['isi'] = 'admin/dashboard/list';
        $this->load->view('admin/layout/wrapper', $data);
    }
}
