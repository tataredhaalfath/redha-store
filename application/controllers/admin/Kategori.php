<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    //load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kategori_model');
        //proteksi halaman
        $this->simple_login->cek_login();
    }
    //data kategori 
    public function index()
    {
        $kategori = $this->kategori_model->listing();
        $data = array(
            'title' => 'Data Kategori Produk',
            'kategori' => $kategori,
            'isi' => 'admin/kategori/list'
        );
        $this->load->view('admin/layout/wrapper', $data);
    }
    //tambah kategori 
    public function tambah()
    {
        //validasi input 
        $valid = $this->form_validation;
        $valid->set_rules('nama_kategori', 'Nama Kategori', 'required|is_unique[kategori.nama_kategori]', [
            'required' => '%s harus diisi!',
            'is_unique' => '$s sudah ada. buat kategori baru!'
        ]);

        if ($valid->run()) {
            $config['upload_path'] = './assets/upload/kategori/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']  = '5000'; //kb
            $config['max_width']  = '2024';
            $config['max_height']  = '2024';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $data = array(
                    'title' => 'Tambah kategori Produk',
                    'error' => $this->upload->display_errors(),
                    'isi' => 'admin/kategori/tambah'
                );
                $this->load->view('admin/layout/wrapper', $data);
            }
            //masuk database
            $upload_gambar = array('upload_data' => $this->upload->data());
            //create thumbnail gambar
            $config['image_library'] = 'gd2';
            $config['source_image'] = './assets/upload/kategori/' . $upload_gambar['upload_data']['file_name'];
            //lokasi folder thumbnail
            $config['new_image'] = './assets/upload/kategori/thumbs/';
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['width']         = 250; //pixel
            $config['height']       = 250; //pixel
            $config['thumb_marker'] = ''; //menghilangkan _thumb pada nama file

            $this->load->library('image_lib', $config);

            $this->image_lib->resize();
            //masuk database
            $i = $this->input;
            $slug_kategori = url_title($this->input->post('nama_kategori'), 'dash', TRUE);
            $data = [
                'slug_kategori' => $slug_kategori,
                'nama_kategori' => htmlspecialchars($i->post('nama_kategori')),
                'urutan' => htmlspecialchars($i->post('urutan')),
                'gambar' => htmlspecialchars($upload_gambar['upload_data']['file_name'])

            ];
            $this->kategori_model->tambah($data);
            $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">
                Data telah ditambah!
            </div>');
            redirect(base_url('admin/kategori'));
        }
        $data = array(
            'title' => 'Tambah Kategori Produk',
            'isi' => 'admin/kategori/tambah'
        );
        $this->load->view('admin/layout/wrapper', $data);
    }
    public function delete($id_kategori)
    {
        $data = [
            'id_kategori' => $id_kategori
        ];
        $this->kategori_model->delete($data);
        $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">
                Data berhasil dihapus!
            </div>');
        redirect(base_url('admin/kategori'));
    }
    //edit kategori
    public function edit($id_kategori)
    {
        $kategori = $this->kategori_model->detail($id_kategori);

        //validasi input
        $valid = $this->form_validation;
        $valid->set_rules('nama_kategori', 'Nama Kategori', 'required', [
            'required' => '%s harus diisi!'
        ]);

        if ($valid->run()) {
            //cek jika gambar diganti
            if (!empty($_FILES['gambar']['name'])) {


                $config['upload_path'] = './assets/upload/kategori/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']  = '5000'; //kb
                $config['max_width']  = '2024';
                $config['max_height']  = '2024';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('gambar')) {
                    $data = array(
                        'title' => 'Edit Kategori Produk',
                        'kategori' => $kategori,
                        'error' => $this->upload->display_errors(),
                        'isi' => 'admin/kategori/edit'
                    );
                    $this->load->view('admin/layout/wrapper', $data);
                } else {
                    //masuk database
                    $upload_gambar = array('upload_data' => $this->upload->data());
                    //create thumbnail gambar
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/upload/kategori/' . $upload_gambar['upload_data']['file_name'];
                    //lokasi folder thumbnail
                    $config['new_image'] = './assets/upload/kategori/thumbs/';
                    $config['create_thumb'] = TRUE;
                    $config['maintain_ratio'] = TRUE;
                    $config['width']         = 250; //pixel
                    $config['height']       = 250; //pixel
                    $config['thumb_marker'] = ''; //menghilangkan _thumb pada nama file

                    $this->load->library('image_lib', $config);

                    $this->image_lib->resize();
                    //end create thumbnail
                    unlink(FCPATH . 'assets/upload/kategori/' . $kategori['gambar']);
                    unlink(FCPATH . 'assets/upload/kategori/thumbs/' . $kategori['gambar']);
                    //masuk database
                    $i = $this->input;
                    $slug_kategori = url_title($this->input->post('nama_kategori'), 'dash', TRUE);
                    $data = [
                        'id_kategori' => $id_kategori,
                        'slug_kategori' => $slug_kategori,
                        'nama_kategori' => htmlspecialchars($i->post('nama_kategori')),
                        'urutan' => htmlspecialchars($i->post('urutan')),
                        'gambar' => htmlspecialchars($upload_gambar['upload_data']['file_name'])

                    ];
                    $this->kategori_model->edit($data);
                    $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">
                Data telah diedit!
            </div>');
                    redirect(base_url('admin/kategori'));
                }
            } else {
                //masuk database
                $i = $this->input;
                $slug_kategori = url_title($this->input->post('nama_kategori'), 'dash', TRUE);
                $data = [
                    'id_kategori' => $id_kategori,
                    'slug_kategori' => $slug_kategori,
                    'nama_kategori' => htmlspecialchars($i->post('nama_kategori')),
                    'urutan' => htmlspecialchars($i->post('urutan'))

                ];
                $this->kategori_model->edit($data);
                $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">
                Data telah diedit!
            </div>');
                redirect(base_url('admin/kategori'));
            }
        }
        $data = array(
            'title' => 'Edit Kategori Produk',
            'kategori' => $kategori,
            'isi' => 'admin/kategori/edit'
        );
        $this->load->view('admin/layout/wrapper', $data);
    }
}
