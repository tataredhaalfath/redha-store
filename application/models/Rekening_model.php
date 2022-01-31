<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekening_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function listing()
    {

        $this->db->select('*');
        $this->db->from('rekening');
        $this->db->order_by('id_rekening', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function tambah($data)
    {
        $this->db->insert('rekening', $data);
    }
    public function delete($data)
    {
        $this->db->where('id_rekening', $data['id_rekening']);
        $this->db->delete('rekening', $data);
    }
    //detail rekening
    public function detail($id_rekening)
    {
        $this->db->select('*');
        $this->db->from('rekening');
        $this->db->where('id_rekening', $id_rekening);
        $query = $this->db->get();
        return $query->row_array();
    }
    //detail rekening
    public function read($slug_rekening)
    {
        $this->db->select('*');
        $this->db->from('rekening');
        $this->db->where('slug_rekening', $slug_rekening);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function edit($data)
    {
        $this->db->where('id_rekening', $data['id_rekening']);
        $this->db->update('rekening', $data);
    }

    public function login($rekeningname, $password)
    {
        $this->db->where('rekeningname', $rekeningname);
        $data = $this->db->get('rekening')->row_array();

        if ($data) {
            if (password_verify($password, $data['password'])) {
                return $this->db->get_where('rekening', ['rekeningname' => $rekeningname])->row_array();
            }
        }
    }
}
