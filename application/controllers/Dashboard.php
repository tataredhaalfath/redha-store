<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pelanggan_model');
        //halaman ini diproteksi dengan simple_pelanggan => cek login
        $this->simple_pelanggan->cek_login();
        $this->load->model('header_transaksi_model');
        $this->load->model('transaksi_model');
        $this->load->model('rekening_model');
    }
    public function index()
    {
        //ambil data login id_pelanggan dari session
        $id_pelanggan = $this->session->userdata('id_pelanggan');
        $header_transaksi = $this->header_transaksi_model->pelanggan($id_pelanggan);

        $data = [
            'title' => 'Dashboard Pelanggan',
            'subtitle' => 'Dashboard Pelanggan',
            'header_transaksi' => $header_transaksi,
            'isi' => 'dashboard/list'

        ];
        $this->load->view('layout/wrapper', $data);
    }
    public function belanja()
    {
        //ambil data login id_pelanggan dari session
        $id_pelanggan = $this->session->userdata('id_pelanggan');
        $header_transaksi = $this->header_transaksi_model->pelanggan($id_pelanggan);

        $data = [

            'title' => 'Riwayat Belanja',
            'subtitle' => 'Riwayat Belanja',
            'header_transaksi' => $header_transaksi,
            'isi' => 'dashboard/belanja'

        ];
        $this->load->view('layout/wrapper', $data);
    }

    //detial
    public function detail($kode_transaksi)
    {
        //ambil data login id_pelanggan dari session
        $id_pelanggan = $this->session->userdata('id_pelanggan');
        $header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
        $transaksi = $this->transaksi_model->kode_transaksi($kode_transaksi);

        //pastikan bahwa pelanggan hanya mengakses data transaksinya
        if ($header_transaksi['id_pelanggan'] != $id_pelanggan) {
            $this->session->set_flashdata('warning', '<div class="alert alert-warning" role="alert">
                Anda mencoba mengakses data oranglain
                </div>');
            redirect(base_url('masuk'));
        }
        $data = [
            'title' => 'Detail Belanja',
            'subtitle' => 'Detail Belanja',
            'header_transaksi' => $header_transaksi,
            'transaksi' => $transaksi,
            'isi' => 'dashboard/detail'

        ];
        $this->load->view('layout/wrapper', $data);
    }
    //profil
    public function profile()
    {
        //ambil data login id_pelanggan dari session
        $id_pelanggan = $this->session->userdata('id_pelanggan');
        $pelanggan = $this->pelanggan_model->detail($id_pelanggan);

        //validasi input
        $valid = $this->form_validation;
        $valid->set_rules('nama_pelanggan', 'Nama Lengkap', 'required', [
            'required' => '%s harus diisi!'
        ]);
        $valid->set_rules('telepon', 'Nomor Telepon', 'required', [
            'required' => '%s harus diisi!'
        ]);
        $valid->set_rules('alamat', 'Alamat Lengkap', 'required', [
            'required' => '%s harus diisi!'
        ]);

        if ($valid->run() == false) {
            $data = [
                'title' => 'Profil Saya',
                'subtitle' => 'Profil Saya',
                'pelanggan' => $pelanggan,
                'isi' => 'dashboard/profil'

            ];
            $this->load->view('layout/wrapper', $data);
        } else {
            //masuk database
            $i = $this->input;
            //kalau password 6 karakter / lebih maka password diganti
            if (strlen($i->post('password')) >= 6) {
                $data = [
                    'id_pelanggan' => $id_pelanggan,
                    'nama_pelanggan' => htmlspecialchars($i->post('nama_pelanggan')),
                    'password' => password_hash($i->post('password'), PASSWORD_DEFAULT),
                    'telepon' => htmlspecialchars($i->post('telepon')),
                    'kelurahan' => htmlspecialchars($i->post('kelurahan')),
                    'kecamatan' => htmlspecialchars($i->post('kecamatan')),
                    'kota' => htmlspecialchars($i->post('kota')),
                    'kode_pos' => htmlspecialchars($i->post('kode_pos')),
                    'alamat' => htmlspecialchars($i->post('alamat'))

                ];
            } else {
                //kalau kurang dari 6 maka password tidak diganti
                $data = [
                    'id_pelanggan' => $id_pelanggan,
                    'nama_pelanggan' => htmlspecialchars($i->post('nama_pelanggan')),
                    'telepon' => htmlspecialchars($i->post('telepon')),
                    'kelurahan' => htmlspecialchars($i->post('kelurahan')),
                    'kecamatan' => htmlspecialchars($i->post('kecamatan')),
                    'kota' => htmlspecialchars($i->post('kota')),
                    'kode_pos' => htmlspecialchars($i->post('kode_pos')),
                    'alamat' => htmlspecialchars($i->post('alamat'))

                ];
            }
            //end data update
            $this->pelanggan_model->edit($data);
            $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">
            Profil berhasil di update
        </div>');
            redirect(base_url('dashboard/profile'));
        }
    }


    //konfirmasi pembayaran
    public function konfirmasi($kode_transaksi)
    {
        $header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
        $rekening = $this->rekening_model->listing();

        //validasi input
        $valid = $this->form_validation;
        $valid->set_rules('nama_bank', 'Nama BANK', 'required', [
            'required' => '%s harus diisi!'
        ]);
        $valid->set_rules('rekening_pembayaran', 'Nomor Rekening', 'required', [
            'required' => '%s harus diisi!',

        ]);
        $valid->set_rules('rekening_pelanggan', 'Nama Pemilik Rekening', 'required', [
            'required' => '%s harus diisi!',

        ]);
        $valid->set_rules('tanggal_bayar', 'Tanggal Pembayaran', 'required', [
            'required' => '%s harus diisi!',

        ]);
        $valid->set_rules('jumlah_bayar', 'Jumlah Pembayaran', 'required', [
            'required' => '%s harus diisi!',

        ]);




        if ($valid->run()) {
            //cek jika gambar diganti
            if (!empty($_FILES['bukti_bayar']['name'])) {


                $config['upload_path'] = './assets/upload/image/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']  = '5000'; //kb
                $config['max_width']  = '3000';
                $config['max_height']  = '3000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('bukti_bayar')) {
                    $data = [
                        'title' => 'Konfirmasi Pembayaran',
                        'subtitle' => 'Konfirmasi Pembayaran',
                        'header_transaksi' => $header_transaksi,
                        'rekening' => $rekening,
                        'error' => $this->upload->display_errors(),
                        'isi' => 'dashboard/konfirmasi'
                    ];

                    $this->load->view('layout/wrapper', $data);
                } else {
                    //masuk database
                    $upload_gambar = array('upload_data' => $this->upload->data());
                    //create thumbnail gambar
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/upload/image/' . $upload_gambar['upload_data']['file_name'];
                    //lokasi folder thumbnail
                    $config['new_image'] = './assets/upload/image/thumbs/';
                    $config['create_thumb'] = TRUE;
                    $config['maintain_ratio'] = TRUE;
                    $config['width']         = 250; //pixel
                    $config['height']       = 250; //pixel
                    $config['thumb_marker'] = ''; //menghilangkan _thumb pada nama file

                    $this->load->library('image_lib', $config);

                    $this->image_lib->resize();
                    //end create thumbnail
                    // unlink(FCPATH . 'assets/upload/image/' . $produk['gambar']);
                    // unlink(FCPATH . 'assets/upload/image/thumbs/' . $produk['gambar']);
                    $i = $this->input;
                    $data = [
                        'id_header_transaksi' => $header_transaksi['id_header_transaksi'],
                        'status_bayar' => 'Konfirmasi',
                        'jumlah_bayar' => htmlspecialchars($i->post('jumlah_bayar')),
                        'rekening_pembayaran' => htmlspecialchars($i->post('rekening_pembayaran')),
                        'rekening_pelanggan' => htmlspecialchars($i->post('rekening_pelanggan')),
                        'bukti_bayar' => htmlspecialchars($upload_gambar['upload_data']['file_name']),
                        'id_rekening' => htmlspecialchars($i->post('id_rekening')),
                        'tanggal_bayar' => htmlspecialchars($i->post('tanggal_bayar')),
                        'nama_bank' => htmlspecialchars($i->post('nama_bank'))

                    ];
                    $this->header_transaksi_model->edit($data);
                    $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">
                            Konfirmasi Pembayaran berhasil dilakukan!
                            </div>');
                    redirect(base_url('dashboard'));
                }
            } else {

                $this->session->set_flashdata('confirm', '<p class="alert alert-warning"> upload bukti bayar </p>');
            }
        }
        //end masuk database
        $data = [
            'title' => 'Konfirmasi Pembayaran',
            'subtitle' => 'Konfirmasi Pembayaran',
            'header_transaksi' => $header_transaksi,
            'rekening' => $rekening,
            'isi' => 'dashboard/konfirmasi'
        ];

        $this->load->view('layout/wrapper', $data);
    }
}
