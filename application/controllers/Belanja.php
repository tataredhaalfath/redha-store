
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Belanja extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('produk_model');
        $this->load->model('kategori_model');
        $this->load->model('pelanggan_model');
        $this->load->model('header_transaksi_model');
        $this->load->model('transaksi_model');
        //load helper random string
        $this->load->helper('string');
    }

    //halaman belanja
    public function index()
    {
        $keranjang = $this->cart->contents();
        $detailkeranjang = $this->cart->contents();


        $data = [
            'title' => 'Keranjang',
            'subtitle' => 'Keranjang',
            'keranjang' => $keranjang,
            'detailkeranjang' => $detailkeranjang,

            'isi' => 'belanja/list'
        ];

        $this->load->view('layout/wrapper', $data);
    }
    //halaman belanja sukses
    public function sukses()
    {

        $data = [
            'title' => 'Belanja Berhasil',
            'subtitle' => 'Belanja Berhasil',

            'isi' => 'belanja/sukses'
        ];

        $this->load->view('layout/wrapper', $data);
    }

    //keranjang belanja 
    public function add()
    {
        //ambil data dari home
        $id = $this->input->post('id');
        $qty = $this->input->post('qty');
        $price = $this->input->post('price');
        $name = $this->input->post('name');
        $size = $this->input->post('ukuran');
        $berat = $this->input->post('berat');
        $redirect_page = $this->input->post('redirect_page');;
        //memasukan ke keranjang belanja
        $data = [
            'id' => $id,
            'qty' => $qty,
            'price' => $price,
            'name' => $name,
            'ukuran' => $size,
            'berat' => $berat
        ];

        if (isset($_POST['checkoutlangsung'])) {
            $this->cart->insert($data);
            //redirect page
            redirect(base_url('belanja/checkout'));
        } else {
            $this->cart->insert($data);
            //redirect page
            redirect($redirect_page);
        }
    }
    //update cart
    public function update_cart($rowid)
    {
        // jika ada data rowid
        if ($rowid) {
            $data = [
                'rowid' => $rowid,
                'qty' => $this->input->post('qty')
            ];
            $this->cart->update($data);
            $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">
                Peroduk berhasil diupdate!
                </div>');

            redirect(base_url('belanja'));
        } else {
            redirect(base_url('belanja'));
        }
    }
    //hapus semua isi keranjang belanja
    public function hapus($rowid)
    {
        if ($rowid) {
            //hapus per item
            $this->cart->remove($rowid);
            $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">
                Peroduk berhasil dihapus!
                </div>');

            redirect(base_url('belanja'));
        } else {
            //hapus semua keranjang
            $this->cart->destroy();
            $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">
                Keranjang Belanja berhasil dihapus!
                </div>');

            redirect(base_url('belanja'));
        }
    }
    //checkout
    public function checkout()
    {
        //cek pelanggan sudah login atau belum
        //jika belum harus registrasi dan login
        //mengecek dengan session email
        if ($this->session->userdata('email')) {
            $email = $this->session->userdata('email');
            $nama_pelanggan = $this->session->userdata('nama_pelanggan');
            $pelanggan = $this->pelanggan_model->sudah_login($email, $nama_pelanggan);
            $keranjang = $this->cart->contents();
            $detailkeranjang = $this->cart->contents();

            //validasi input
            $valid = $this->form_validation;
            $valid->set_rules('nama_pelanggan', 'Nama Lengkap', 'required', [
                'required' => '%s harus diisi!'
            ]);
            $valid->set_rules('email', 'Email', 'required|valid_email', [
                'required' => '%s harus diisi!',
                'valid_email' => '%s tidak valid',

            ]);
            $valid->set_rules('kelurahan', 'Kelurahan', 'required', [
                'required' => '%s harus diisi!'
            ]);
            $valid->set_rules('kecamatan', 'Kecamatan', 'required', [
                'required' => '%s harus diisi!'
            ]);
            $valid->set_rules('kota', 'Kota', 'required', [
                'required' => '%s harus diisi!'
            ]);
            $valid->set_rules('kode_pos', 'Kode Pos', 'required', [
                'required' => '%s harus diisi!'
            ]);
            $valid->set_rules('alamat', 'Alamat', 'required', [
                'required' => '%s harus diisi!'
            ]);
            $valid->set_rules('telepon', 'Nomor Telepon', 'required', [
                'required' => '%s harus diisi!'
            ]);


            if ($valid->run() == false) {


                $data = [
                    'title' => 'Checkout',
                    'subtitle' => 'Checkout',
                    'pelanggan' => $pelanggan,
                    'keranjang' => $keranjang,
                    'detailkeranjang' => $detailkeranjang,
                    'isi' => 'belanja/checkout'
                ];

                $this->load->view('layout/wrapper', $data);
                //masuk database
            } else {
                //masuk database
                $i = $this->input;
                $data = [
                    'id_pelanggan' => $pelanggan['id_pelanggan'],
                    'nama_pelanggan' => htmlspecialchars($i->post('nama_pelanggan')),
                    'email' => htmlspecialchars($i->post('email')),
                    'telepon' => htmlspecialchars($i->post('telepon')),
                    'kelurahan' => htmlspecialchars($i->post('kelurahan')),
                    'kecamatan' => htmlspecialchars($i->post('kecamatan')),
                    'kota' => htmlspecialchars($i->post('kota')),
                    'kode_pos' => htmlspecialchars($i->post('kode_pos')),
                    'alamat' => htmlspecialchars($i->post('alamat')),
                    'kode_transaksi' => htmlspecialchars($i->post('kode_transaksi')),
                    'tanggal_transaksi' => ($i->post('tanggal_transaksi')),
                    'kurir' => htmlspecialchars($i->post('kurir')),
                    'jumlah_transaksi' => htmlspecialchars($i->post('jumlah_transaksi')),
                    'status_bayar' => 'Belum',
                    'tanggal_post' => date('Y-m-d H:i:s')

                ];
                //masuk ke header transaksi
                $this->header_transaksi_model->tambah($data);

                //masuk ke tabel transaksi
                foreach ($keranjang as $keranjang) {
                    $data = [
                        'id_pelanggan' => $pelanggan['id_pelanggan'],
                        'kode_transaksi' => $i->post('kode_transaksi'),
                        'id_produk' => $keranjang['id'],
                        'id_ukuran' => $keranjang['ukuran'],
                        'harga' => $keranjang['price'],
                        'jumlah' => $keranjang['qty'],
                        'total_harga' => $keranjang['subtotal'],
                        'tanggal_transaksi' => $i->post('tanggal_transaksi')
                    ];
                    $this->transaksi_model->tambah($data);
                }
                //end proses masuk ke tabel transaksi
                //setelah masuk ke tabel transaksi maka keranjang dikosongkan lagi
                $this->cart->destroy();
                //end pengosongan keranjang
                $this->session->set_flashdata('sukses', '<div class="alert alert-warning" role="alert">
                    Checkout berhasil
                </div>');

                redirect(base_url('dashboard/belanja'));
            }
            //end masuk database
        } else {
            //registrasi dulu
            $this->session->set_flashdata('success', '<div class="alert alert-danger" role="alert">
                Silahkan Login atau Registrasi terlebih dahulu
                </div>');

            redirect(base_url('registrasi'));
        }
    }
}

/* End of file Controllername.php */
