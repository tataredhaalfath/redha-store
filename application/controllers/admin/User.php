<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    //load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        //proteksi halaman
        $this->simple_login->cek_login();
    }
    //data user
    public function index()
    {
        $user = $this->user_model->listing();
        $data = array(
            'title' => 'Data Pengguna',
            'user' => $user,
            'isi' => 'admin/user/list'
        );
        $this->load->view('admin/layout/wrapper', $data);
    }
    //tambah user
    public function tambah()
    {
        //validasi input
        $valid = $this->form_validation;
        $valid->set_rules('nama', 'Nama Lengkap', 'required', [
            'required' => '%s harus diisi!'
        ]);
        $valid->set_rules('email', 'Email', 'required|valid_email', [
            'required' => '%s harus diisi!',
            'valid_email' => '%s tidak valid'
        ]);
        $valid->set_rules('username', 'Username', 'required|is_unique[user.username]|min_length[5]|max_length[32]', [
            'required' => '%s harus diisi!',
            'min_length' => '%s minimal 5 karakter',
            'max_length' => '%s maksimal 32 karakter',
            'is_unique' => '%s sudah ada. Buat username baru'
        ]);
        $valid->set_rules('password', 'Password', 'required', [
            'required' => '%s harus diisi!'
        ]);


        if ($valid->run() == false) {
            $data = array(
                'title' => 'Tambah Pengguna',
                'isi' => 'admin/user/tambah'
            );
            $this->load->view('admin/layout/wrapper', $data);
        } else {
            //masuk database
            $i = $this->input;
            $data = [
                'nama' => htmlspecialchars($i->post('nama')),
                'email' => htmlspecialchars($i->post('email')),
                'username' => htmlspecialchars($i->post('username')),
                'password' => password_hash($i->post('password'), PASSWORD_DEFAULT),
                'akses_level' => htmlspecialchars($i->post('akses_level')),

            ];
            $this->user_model->tambah($data);
            $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">
                Data telah ditambah!
            </div>');
            redirect(base_url('admin/user'));
        }
    }
    public function delete($id_user)
    {
        $data = [
            'id_user' => $id_user
        ];
        $this->user_model->delete($data);
        $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">
                Data berhasil dihapus!
            </div>');
        redirect(base_url('admin/user'));
    }
    //edit user
    public function edit($id_user)
    {
        $user = $this->user_model->detail($id_user);
        //validasi input
        $valid = $this->form_validation;
        $valid->set_rules('nama', 'Nama Lengkap', 'required', [
            'required' => '%s harus diisi!'
        ]);
        $valid->set_rules('email', 'Email', 'required|valid_email', [
            'required' => '%s harus diisi!',
            'valid_email' => '%s tidak valid'
        ]);
        $valid->set_rules('password', 'Password', 'required', [
            'required' => '%s harus diisi!'
        ]);


        if ($valid->run() == false) {
            $data = array(
                'title' => 'Edit Pengguna',
                'user' => $user,
                'isi' => 'admin/user/edit'
            );
            $this->load->view('admin/layout/wrapper', $data);
        } else {
            //masuk database
            $i = $this->input;
            $data = [
                'id_user' => $id_user,
                'nama' => htmlspecialchars($i->post('nama')),
                'email' => htmlspecialchars($i->post('email')),
                'username' => htmlspecialchars($i->post('username')),
                'password' => password_hash($i->post('password'), PASSWORD_DEFAULT),
                'akses_level' => htmlspecialchars($i->post('akses_level')),

            ];
            $this->user_model->edit($data);
            $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">
                Data telah diedit!
            </div>');
            redirect(base_url('admin/user'));
        }
    }

    // user detail
    public function detail($id_user)
    {

        $userdetail = $this->user_model->detail($id_user);
        $data = array(
            'title' => 'Data User',
            'user' => $userdetail,
            'isi' => 'admin/user/detail'
        );
        $this->load->view('admin/layout/wrapper', $data);
    }

    // edit profile user
    public function editprofile($id_user)
    {
        $user = $this->user_model->detail($id_user);
        //validasi input
        $valid = $this->form_validation;
        $valid->set_rules('nama', 'Nama Lengkap', 'required', [
            'required' => '%s harus diisi!'
        ]);
        $valid->set_rules('email', 'Email', 'required|valid_email', [
            'required' => '%s harus diisi!',
            'valid_email' => '%s tidak valid'
        ]);



        if ($valid->run()) {
            if (!empty($_FILES['gambar']['name'])) {
                $config['upload_path'] = './assets/upload/profile/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']  = '5000'; //kb
                $config['max_width']  = '2024';
                $config['max_height']  = '2024';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('gambar')) {
                    $data = array(
                        'title' => 'Edit Profile',
                        'error' => $this->upload->display_errors(),
                        'isi' => 'admin/user/editprofile',
                    );
                    $this->load->view('admin/layout/wrapper', $data);
                } else {
                    //masuk database
                    $upload_gambar = array('upload_data' => $this->upload->data());
                    //create thumbnail gambar
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/upload/profile/' . $upload_gambar['upload_data']['file_name'];
                    //lokasi folder thumbnail
                    $config['new_image'] = './assets/upload/profile/thumbs/';
                    $config['create_thumb'] = TRUE;
                    $config['maintain_ratio'] = TRUE;
                    $config['width']         = 250; //pixel
                    $config['height']       = 250; //pixel
                    $config['thumb_marker'] = ''; //menghilangkan _thumb pada nama file

                    $this->load->library('image_lib', $config);

                    $this->image_lib->resize();
                    //end create thumbnail
                    unlink(FCPATH . 'assets/upload/profile/' . $user['gambar']);
                    unlink(FCPATH . 'assets/upload/profile/thumbs/' . $user['gambar']);
                    $i = $this->input;
                    $data = [
                        'id_user' => $id_user,
                        'nama' => htmlspecialchars($i->post('nama')),
                        'email' => htmlspecialchars($i->post('email')),
                        'gambar' => htmlspecialchars($upload_gambar['upload_data']['file_name'])
                    ];
                    $this->user_model->edit($data);
                    $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">
                        Data telah diedit!
                        </div>');
                    redirect(base_url('admin/user/detail/') . $id_user);
                }
            } else {
                //masuk database
                $i = $this->input;
                $data = [
                    'id_user' => $id_user,
                    'nama' => htmlspecialchars($i->post('nama')),
                    'email' => htmlspecialchars($i->post('email'))
                ];
                $this->user_model->edit($data);
                $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">
                    Data telah diedit!
                </div>');
                redirect(base_url('admin/user/detail/') . $id_user);
            }
        }
        $data = array(
            'title' => 'Edit Profile',
            'user' => $user,
            'isi' => 'admin/user/editprofile'
        );
        $this->load->view('admin/layout/wrapper', $data);
    }

    // edit pass user
    public function editpass($id_user)
    {
        $user = $this->user_model->detail($id_user);
        //validasi input
        $valid = $this->form_validation;
        $valid->set_rules('passlama', 'Password Lama', 'required', [
            'required' => '%s harus diisi!'
        ]);
        $valid->set_rules('passbaru', 'Password Baru', 'required|differs[passlama]', [
            'required' => '%s harus diisi!',
            'differs' => '%s harus beda dari password lama'
        ]);
        $valid->set_rules('confirmpass', 'Password Konfirmasi', 'required|matches[passbaru]', [
            'required' => '%s harus diisi!',
            'matches' => '%s harus sama dengan password baru'
        ]);




        if ($valid->run() == false) {
            $data = array(
                'title' => 'Edit Password',
                'user' => $user,
                'isi' => 'admin/user/editpass'
            );
            $this->load->view('admin/layout/wrapper', $data);
        } else {
            //masuk database

            $i = $this->input;
            $data = [
                'id_user' => $id_user,
                'password' => password_hash($i->post('passbaru'), PASSWORD_DEFAULT)
            ];
            $passlama = $this->input->post('passlama');
            if (password_verify($passlama, $user['password'])) {
                $this->user_model->edit($data);
                $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">
                Password telah diedit!
             </div>');
                redirect(base_url('admin/user/detail/') . $id_user);
            } else {
                $this->session->set_flashdata('gagal', '<div class="alert alert-warning" role="alert">
                Password Lama tidak sesuai!
                </div>');
                redirect(base_url('admin/user/editpass/') . $id_user);
            }
        }
    }
}
