<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ukuran_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function listing()
    {
        $this->db->select('*');
        $this->db->from('ukuran');
        $this->db->order_by('id_ukuran', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }


    public function tambah($data)
    {
        $this->db->insert('ukuran', $data);
    }
    public function delete($data)
    {
        $this->db->where('id_ukuran', $data['id_ukuran']);
        $this->db->delete('ukuran', $data);
    }
    //detail ukuran
    public function detail($id_ukuran)
    {
        $this->db->select('*');
        $this->db->from('ukuran');
        $this->db->where('id_ukuran', $id_ukuran);
        $query = $this->db->get();
        return $query->row_array();
    }
    //detail ukuran
    public function read($slug_ukuran)
    {
        $this->db->select('*');
        $this->db->from('ukuran');
        $this->db->where('slug_ukuran', $slug_ukuran);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function edit($data)
    {
        $this->db->where('id_ukuran', $data['id_ukuran']);
        $this->db->update('ukuran', $data);
    }

    public function login($ukuranname, $password)
    {
        $this->db->where('ukuranname', $ukuranname);
        $data = $this->db->get('ukuran')->row_array();

        if ($data) {
            if (password_verify($password, $data['password'])) {
                return $this->db->get_where('ukuran', ['ukuranname' => $ukuranname])->row_array();
            }
        }
    }
}
