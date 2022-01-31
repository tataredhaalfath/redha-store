<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    //load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('header_transaksi_model');
        $this->load->model('transaksi_model');
        $this->load->model('rekening_model');
        $this->load->model('konfigurasi_model');
    }
    //load data transaksi
    public function index()
    {
        $header_transaksi = $this->header_transaksi_model->listing();
        $data = [
            'title' => 'Data Transaksi',
            'header_transaksi' => $header_transaksi,
            'isi' => 'admin/transaksi/list'
        ];
        $this->load->view('admin/layout/wrapper', $data);
    }
    //detial
    public function detail($kode_transaksi)
    {
        $header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
        $transaksi = $this->transaksi_model->kode_transaksi($kode_transaksi);

        $data = [
            'title' => 'Riwayat Belanja',
            'subtitle' => 'Riwayat Belanja',
            'header_transaksi' => $header_transaksi,
            'transaksi' => $transaksi,
            'isi' => 'admin/transaksi/detail'

        ];
        $this->load->view('admin/layout/wrapper', $data);
    }

    //cetak
    public function cetak($kode_transaksi)
    {
        $header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
        $transaksi = $this->transaksi_model->kode_transaksi($kode_transaksi);
        $site = $this->konfigurasi_model->listing();
        $data = [
            'title' => 'Riwayat Belanja',
            'subtitle' => 'Riwayat Belanja',
            'site' => $site,
            'header_transaksi' => $header_transaksi,
            'transaksi' => $transaksi,

        ];
        $this->load->view('admin/transaksi/cetak', $data, false);
    }

    //unduh pdf
    public function pdf($kode_transaksi)
    {
        $header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
        $transaksi = $this->transaksi_model->kode_transaksi($kode_transaksi);
        $site = $this->konfigurasi_model->listing();
        $data = [
            'title' => 'Riwayat Belanja',
            'subtitle' => 'Riwayat Belanja',
            'site' => $site,
            'header_transaksi' => $header_transaksi,
            'transaksi' => $transaksi,

        ];
        // $this->load->view('admin/transaksi/cetak', $data);

        // $html = $this->load->view('admin/transaksi/cetak', $data, true);

        // Create an instance of the class:
        $mpdf = new \Mpdf\Mpdf();

        $html = $this->load->view('admin/transaksi/cetakpdf', $data, true);




        // Write some HTML code:
        $mpdf->WriteHTML($html);

        // Output a PDF file directly to the browser
        $mpdf->Output('bukti-pembayaran.pdf', \Mpdf\Output\Destination::INLINE);
    }

    //pengiriman
    public function kirim($kode_transaksi)
    {
        $header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
        $transaksi = $this->transaksi_model->kode_transaksi($kode_transaksi);
        $site = $this->konfigurasi_model->listing();
        $data = [
            'title' => 'Riwayat Belanja',
            'subtitle' => 'Riwayat Belanja',
            'site' => $site,
            'header_transaksi' => $header_transaksi,
            'transaksi' => $transaksi,

        ];
        // $this->load->view('admin/transaksi/kirim', $data);

        // $html = $this->load->view('admin/transaksi/kirim', $data, true);

        // Create an instance of the class:
        $mpdf = new \Mpdf\Mpdf();

        $html = $this->load->view('admin/transaksi/kirim', $data, true);

        //Setting header dan footer
        $mpdf->SetHTMLHeader('
        <div style="text-align: left; font-weight: bold;">
            <img src="' . base_url('assets/upload/image/' . $site['logo']) . '" style="height:50px; width:auto;">
        </div>');
        $mpdf->SetHTMLFooter('
            <div style="padding: 10px 20px; background-color: #F9B234; color:white; font-size:12px;">
                Alamat : ' . $site['namaweb'] . ' (' . $site['alamat'] . ')<br>
                Telepon : ' . $site['telepon'] . ' 
            </div>
        ');
        // Write some HTML code:
        $mpdf->WriteHTML($html);

        // Output a PDF file directly to the browser
        $nama_file_pdf = url_title($site["namaweb"], 'dash', 'true') . '-' . $kode_transaksi . '.pdf';
        $mpdf->Output($nama_file_pdf, 'I');
    }

    public function status($kode_transaksi)
    {
        $header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
        $transaksi = $this->transaksi_model->kode_transaksi($kode_transaksi);

        //validasi input
        $valid = $this->form_validation;
        $valid->set_rules('ekspedisi', 'Eskpedisi', 'required', [
            'required' => '%s harus diisi!'
        ]);
        $valid->set_rules('resi', 'Nomor Resi', 'required', [
            'required' => '%s harus diisi!'
        ]);
        if ($valid->run()) {
            $data = [
                'id_header_transaksi' => $header_transaksi['id_header_transaksi'],
                'ekspedisi' => htmlspecialchars($this->input->post('ekspedisi')),
                'resi' => htmlspecialchars($this->input->post('resi'))

            ];
            $this->header_transaksi_model->edit($data);
            redirect(base_url('admin/transaksi'));
        } else {

            $data = [
                'title' => 'Status Pesanan',
                'subtitle' => 'Status Pesanan',
                'header_transaksi' => $header_transaksi,
                'transaksi' => $transaksi,
                'isi' => 'admin/transaksi/status'

            ];
            $this->load->view('admin/layout/wrapper', $data);
        }
    }
}

/* End of file Controllername.php */
