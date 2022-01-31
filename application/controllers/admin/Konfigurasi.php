<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konfigurasi extends CI_Controller
{
    //load model

    public function __construct()
    {
        parent::__construct();
        $this->load->model('konfigurasi_model');
    }

    //konfigurasi umum
    public function index()
    {
        $konfigurasi = $this->konfigurasi_model->listing();

        //validasi input
        $valid = $this->form_validation;
        $valid->set_rules('namaweb', 'Nama Website', 'required', [
            'required' => '%s harus diisi!'
        ]);

        if ($valid->run() == false) {
            $data = array(
                'title' => 'Konfigurasi Website',
                'isi' => 'admin/konfigurasi/list',
                'konfigurasi' => $konfigurasi
            );
            $this->load->view('admin/layout/wrapper', $data);
        } else {
            //masuk database
            $i = $this->input;
            $data = [
                'id_konfigurasi' => $konfigurasi['id_konfigurasi'],
                'namaweb' => htmlspecialchars($i->post('namaweb')),
                'tagline' => htmlspecialchars($i->post('tagline')),
                'email' => htmlspecialchars($i->post('email')),
                'website' => htmlspecialchars($i->post('website')),
                'keyword' => htmlspecialchars($i->post('keyword')),
                'metatext' => htmlspecialchars($i->post('metatext')),
                'telepon' => htmlspecialchars($i->post('telepon')),
                'alamat' => htmlspecialchars($i->post('alamat')),
                'facebook' => htmlspecialchars($i->post('facebook')),
                'instagram' => htmlspecialchars($i->post('instagram')),
                'deskripsi' => htmlspecialchars($i->post('deskripsi')),
                'rekening_pembayaran' => htmlspecialchars($i->post('rekening_pembayaran'))

            ];
            $this->konfigurasi_model->edit($data);
            $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">
                Data telah diupdate!
            </div>');
            redirect(base_url('admin/konfigurasi'));
        }
    }

    //konfigurasi logo website
    public function logo()
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        //validasi input
        $valid = $this->form_validation;
        $valid->set_rules('namaweb', 'Nama Website', 'required', [
            'required' => '%s harus diisi!'
        ]);

        if ($valid->run()) {
            //cek jika gambar logo
            if (!empty($_FILES['logo']['name'])) {


                $config['upload_path'] = './assets/upload/image/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']  = '5000'; //kb
                $config['max_width']  = '2024';
                $config['max_height']  = '2024';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('logo')) {
                    $data = array(
                        'title' => 'Konfigurasi Logo Website',
                        'error' => $this->upload->display_errors(),
                        'isi' => 'admin/konfigurasi/logo',
                        'konfigurasi' => $konfigurasi
                    );
                    $this->load->view('admin/layout/wrapper', $data);
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
                    unlink(FCPATH . 'assets/upload/image/' . $konfigurasi['logo']);
                    unlink(FCPATH . 'assets/upload/image/thumbs/' . $konfigurasi['logo']);
                    $i = $this->input;
                    $data = [
                        'id_konfigurasi' => $konfigurasi['id_konfigurasi'],
                        'namaweb' => htmlspecialchars($i->post('namaweb')),
                        //disimpan nama file gambar
                        'logo' => htmlspecialchars($upload_gambar['upload_data']['file_name']),

                    ];
                    $this->konfigurasi_model->edit($data);
                    $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">
                                Data telah update!
                        </div>');
                    redirect(base_url('admin/konfigurasi/logo'));
                }
            } else {
                //edit produk tanpa ganti logo
                $i = $this->input;
                $data = [
                    'id_konfigurasi' => $konfigurasi['id_konfigurasi'],
                    'namaweb' => htmlspecialchars($i->post('namaweb'))
                    //disimpan nama file gambar
                    //'logo' => htmlspecialchars($upload_gambar['upload_data']['file_name']),

                ];
                $this->konfigurasi_model->edit($data);
                $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">
                                Data telah update!
                        </div>');
                redirect(base_url('admin/konfigurasi/logo'));
            }
        }
        //end masuk database
        $data = array(
            'title' => 'Konfigurasi Logo Website',
            'isi' => 'admin/konfigurasi/logo',
            'konfigurasi' => $konfigurasi
        );
        $this->load->view('admin/layout/wrapper', $data);
    }
    //konfigurasi icon
    public function icon()
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        //validasi input
        $valid = $this->form_validation;
        $valid->set_rules('namaweb', 'Nama Website', 'required', [
            'required' => '%s harus diisi!'
        ]);

        if ($valid->run()) {
            //cek jika gambar Icon
            if (!empty($_FILES['icon']['name'])) {


                $config['upload_path'] = './assets/upload/image/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']  = '5000'; //kb
                $config['max_width']  = '2024';
                $config['max_height']  = '2024';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('icon')) {
                    $data = array(
                        'title' => 'Konfigurasi Icon Website',
                        'error' => $this->upload->display_errors(),
                        'isi' => 'admin/konfigurasi/icon',
                        'konfigurasi' => $konfigurasi
                    );
                    $this->load->view('admin/layout/wrapper', $data);
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
                    unlink(FCPATH . 'assets/upload/image/' . $konfigurasi['icon']);
                    unlink(FCPATH . 'assets/upload/image/thumbs/' . $konfigurasi['icon']);
                    $i = $this->input;
                    $data = [
                        'id_konfigurasi' => $konfigurasi['id_konfigurasi'],
                        'namaweb' => htmlspecialchars($i->post('namaweb')),
                        //disimpan nama file gambar
                        'icon' => htmlspecialchars($upload_gambar['upload_data']['file_name']),

                    ];
                    $this->konfigurasi_model->edit($data);
                    $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">
                                Data telah update!
                        </div>');
                    redirect(base_url('admin/konfigurasi/icon'));
                }
            } else {
                //edit produk tanpa ganti Icon
                $i = $this->input;
                $data = [
                    'id_konfigurasi' => $konfigurasi['id_konfigurasi'],
                    'namaweb' => htmlspecialchars($i->post('namaweb'))
                    //disimpan nama file gambar
                    //'icon' => htmlspecialchars($upload_gambar['upload_data']['file_name']),

                ];
                $this->konfigurasi_model->edit($data);
                $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">
                                Data telah update!
                        </div>');
                redirect(base_url('admin/konfigurasi/icon'));
            }
        }
        //end masuk database
        $data = array(
            'title' => 'Konfigurasi Logo Website',
            'isi' => 'admin/konfigurasi/icon',
            'konfigurasi' => $konfigurasi
        );
        $this->load->view('admin/layout/wrapper', $data);
    }
}

/* End of file Controllername.php */
