<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Laporan_model');
    }
    public function index()
    {
        $data = array(
            'title' => 'Laporan Penjualan',
            'isi' => 'admin/laporan/list'
        );

        $this->load->view('admin/layout/wrapper', $data);
    }

    public function harian()
    {
        $tanggal = $this->input->post('tanggal');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $laporan = $this->Laporan_model->lap_harian($tanggal, $bulan, $tahun);

        $data = array(
            'title' => 'Laporan Penjualan Harian',
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'laporan' => $laporan,
            'isi' => 'admin/laporan/harian'
        );

        $this->load->view('admin/layout/wrapper', $data);
    }

    public function bulanan()
    {

        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $laporan = $this->Laporan_model->lap_bulanan($bulan, $tahun);

        $data = array(
            'title' => 'Laporan Penjualan Bulanan',

            'bulan' => $bulan,
            'tahun' => $tahun,
            'laporan' => $laporan,
            'isi' => 'admin/laporan/bulanan'
        );

        $this->load->view('admin/layout/wrapper', $data);
    }

    public function tahunan()
    {

        $tahun = $this->input->post('tahun');
        $laporan = $this->Laporan_model->lap_tahunan($tahun);

        $data = array(
            'title' => 'Laporan Penjualan Tahunan',
            'tahun' => $tahun,
            'laporan' => $laporan,
            'isi' => 'admin/laporan/tahunan'
        );

        $this->load->view('admin/layout/wrapper', $data);
    }
}
