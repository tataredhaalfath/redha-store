<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function listing()
    {
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->order_by('id_pelanggan', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function tambah($data)
    {
        $this->db->insert('pelanggan', $data);
    }
    public function delete($data)
    {
        $this->db->where('id_pelanggan', $data['id_pelanggan']);
        $this->db->delete('pelanggan', $data);
    }

    //detail pelanggan
    public function detail($id_pelanggan)
    {
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->where('id_pelanggan', $id_pelanggan);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function edit($data)
    {
        $this->db->where('id_pelanggan', $data['id_pelanggan']);
        $this->db->update('pelanggan', $data);
    }
    //pelanggan sudah login
    public function sudah_login($email, $nama_pelanggan)
    {
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->where('email', $email);
        $this->db->where('nama_pelanggan', $nama_pelanggan);
        $query = $this->db->get();
        return $query->row_array();
    }

    //login pelanggan
    public function login($email, $password)
    {
        $this->db->where('email', $email);
        $data = $this->db->get('pelanggan')->row_array();

        if ($data) {

            if (password_verify($password, $data['password'])) {

                return $this->db->get_where('pelanggan', ['email' => $email])->row_array();
            }
        }
    }
}
