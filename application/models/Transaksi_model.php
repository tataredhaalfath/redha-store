<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function listing()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->order_by('id_transaksi', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }
    //listing berdasarkan header 
    public function kode_transaksi($kode_transaksi)
    {
        $this->db->select('transaksi.*,
        produk.nama_produk, produk.kode_produk, ukuran.*');
        $this->db->from('transaksi');
        //join dengan produk
        $this->db->join('produk', 'produk.id_produk = transaksi.id_produk', 'left');
        $this->db->join('ukuran', 'ukuran.id_ukuran = transaksi.id_ukuran', 'left');
        //end join
        $this->db->where('kode_transaksi', $kode_transaksi);
        $this->db->order_by('id_transaksi', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function tambah($data)
    {
        $this->db->insert('transaksi', $data);
    }
    public function delete($data)
    {
        $this->db->where('id_transaksi', $data['id_transaksi']);
        $this->db->delete('transaksi', $data);
    }
    //detail transaksi
    public function detail($id_transaksi)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('id_transaksi', $id_transaksi);
        $query = $this->db->get();
        return $query->row_array();
    }
    //detail transaksi
    public function read($slug_transaksi)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('slug_transaksi', $slug_transaksi);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function edit($data)
    {
        $this->db->where('id_transaksi', $data['id_transaksi']);
        $this->db->update('transaksi', $data);
    }

    public function login($transaksiname, $password)
    {
        $this->db->where('transaksiname', $transaksiname);
        $data = $this->db->get('transaksi')->row_array();

        if ($data) {
            if (password_verify($password, $data['password'])) {
                return $this->db->get_where('transaksi', ['transaksiname' => $transaksiname])->row_array();
            }
        }
    }
}
