
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

    //load
    public function __construct()
    {
        parent::__construct();
        $this->load->model('produk_model');
        $this->load->model('kategori_model');
        $this->load->model('ukuran_model');
    }
    //listing data produk
    public function index()
    {
        $site = $this->konfigurasi_model->listing();
        $listing_kategori = $this->produk_model->listing_kategori();
        //ambil data total
        $total = $this->produk_model->total_produk();
        //paginasi start

        $this->load->library('pagination');

        $config['base_url']         = base_url() . 'produk/index/';
        $config['total_rows']       = $total['total'];
        $config['use_page_numbers']  = true;
        $config['per_page']         = 10;
        $config['uri_segment']      = 3;
        $config['num_links']        = 5;
        $config['full_tag_open']    = '<ul class="pagination">';
        $config['full_tag_close']   = '</ul>';
        $config['first_link']       = 'First';
        $config['first_tag_open']   = '<li>';
        $config['first_tag_close']  = '</li>';
        $config['last_link']        = 'Last';
        $config['last_tag_open']    = '<li class="disabled"><li class="active"><a href="#">';
        $config['last_tag_close']   = '<span class="sr-only"></a></li></li>';
        $config['next_link']        = '&gt;';
        $config['next_tag_open']    = '<div>';
        $config['next_tag_close']   = '</div>';
        $config['prev_link']        = '&lt;';
        $config['prev_tag_open']    = '<div>';
        $config['prev_tag_close']   = '</div>';
        $config['cur_tag_open']     = '<b>';
        $config['cur_tag_close']    = '</b>';
        $config['first_url']        = base_url() . '/produk';

        $this->pagination->initialize($config);
        //ambil data produk
        $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * $config['per_page'] : 0;
        $produk = $this->produk_model->produk($config['per_page'], $page);

        //paginasi end
        $data = [
            'title' => 'Ar Rayan Store',
            'subtitle' => 'Produk',
            'isi' => 'produk/list',
            'site' => $site,
            'listing_kategori' => $listing_kategori,
            'pagin' => $this->pagination->create_links(),
            'produk' => $produk

        ];
        $this->load->view('layout/wrapper', $data);
    }
    //kategori produk
    //listing data produk
    public function kategori($slug_kategori)
    {
        //kategori detial
        $kategori = $this->kategori_model->read($slug_kategori);
        $id_kategori = $kategori['id_kategori'];
        $site = $this->konfigurasi_model->listing();
        $listing_kategori = $this->produk_model->listing_kategori();
        //ambil data total
        $total = $this->produk_model->total_kategori($id_kategori);
        //paginasi start

        $this->load->library('pagination');

        $config['base_url']         = base_url() . 'produk/kategori/' . $slug_kategori . '/index/';
        $config['total_rows']       = $total['total'];
        $config['use_page_numbers']  = true;
        $config['per_page']         = 8;
        $config['uri_segment']      = 5;
        $config['num_links']        = 5;
        $config['full_tag_open']    = '<ul class="pagination">';
        $config['full_tag_close']   = '</ul>';
        $config['first_link']       = 'First';
        $config['first_tag_open']   = '<li>';
        $config['first_tag_close']  = '</li>';
        $config['last_link']        = 'Last';
        $config['last_tag_open']    = '<li class="disabled"><li class="active"><a href="#">';
        $config['last_tag_close']   = '<span class="sr-only"></a></li></li>';
        $config['next_link']        = '&gt;';
        $config['next_tag_open']    = '<div>';
        $config['next_tag_close']   = '</div>';
        $config['prev_link']        = '&lt;';
        $config['prev_tag_open']    = '<div>';
        $config['prev_tag_close']   = '</div>';
        $config['cur_tag_open']     = '<b>';
        $config['cur_tag_close']    = '</b>';
        $config['first_url']        = base_url() . '/produk/kategori/' . $slug_kategori;

        $this->pagination->initialize($config);
        //ambil data produk
        $page = ($this->uri->segment(5)) ? ($this->uri->segment(5) - 1) * $config['per_page'] : 0;
        $produk = $this->produk_model->kategori($id_kategori, $config['per_page'], $page);

        //paginasi end
        $data = [
            'title' => 'Ar Rayan Store',
            'subtitle' => 'Produk',
            'isi' => 'produk/list',
            'site' => $site,
            'listing_kategori' => $listing_kategori,
            'pagin' => $this->pagination->create_links(),
            'produk' => $produk,
            'kategori' => $kategori

        ];
        $this->load->view('layout/wrapper', $data);
    }
    public function detail($slug_produk)
    {
        // mencari related produk berdasarkan kategori yang sama
        $related = $this->db->get_where('produk', ['slug_produk' => $slug_produk])->row_array();
        $kat = $related['id_kategori'];


        $site = $this->konfigurasi_model->listing();
        $produk = $this->produk_model->read($slug_produk);
        $ukuran = $this->ukuran_model->listing();
        $id_produk = $produk['id_produk'];
        $gambar = $this->produk_model->gambar($id_produk);
        $produk_related = $this->produk_model->related($kat);
        $data = [
            'title' => 'Detail Produk',
            'subtitle' => 'Detail Produk',
            'isi' => 'produk/detail',
            'site' => $site,
            'produk' => $produk,
            'ukuran' => $ukuran,
            'produk_related' => $produk_related,
            'gambar' => $gambar

        ];
        $this->load->view('layout/wrapper', $data);
    }
}
 
/* End of file Controllername.php */
