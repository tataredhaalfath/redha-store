<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Header_transaksi_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function listing()
    {
        $this->db->select('header_transaksi.*,
        header_transaksi.nama_pelanggan as nama_penerima,
        pelanggan.nama_pelanggan,
        SUM(transaksi.jumlah) as total_item
        ');
        $this->db->from('header_transaksi');
        $this->db->join('transaksi', 'transaksi.kode_transaksi = header_transaksi.kode_transaksi', 'left');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = header_transaksi.id_pelanggan', 'left');
        $this->db->group_by('header_transaksi.id_header_transaksi');
        $this->db->order_by('id_header_transaksi', 'desc');
        $this->db->order_by('id_header_transaksi', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    //listing pelanggan
    public function pelanggan($id_pelanggan)
    {
        $this->db->select('header_transaksi.*,
        SUM(transaksi.jumlah) as total_item
        ');
        $this->db->from('header_transaksi');
        $this->db->where('header_transaksi.id_pelanggan', $id_pelanggan);
        $this->db->join('transaksi', 'transaksi.kode_transaksi = header_transaksi.kode_transaksi', 'left');
        $this->db->group_by('header_transaksi.id_header_transaksi');
        $this->db->order_by('id_header_transaksi', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function tambah($data)
    {
        $this->db->insert('header_transaksi', $data);
    }
    public function delete($data)
    {
        $this->db->where('id_header_transaksi', $data['id_header_transaksi']);
        $this->db->delete('header_transaksi', $data);
    }
    //
    public function kode_transaksi($kode_transaksi)
    {
        $this->db->select('header_transaksi.*,
        header_transaksi.nama_pelanggan as nama_penerima,
        rekening.nama_bank AS bank,
        rekening.nomor_rekening,
        rekening.nama_pemilik,
        pelanggan.nama_pelanggan,
        SUM(transaksi.jumlah) as total_item
        ');
        $this->db->from('header_transaksi');
        $this->db->join('transaksi', 'transaksi.kode_transaksi = header_transaksi.kode_transaksi', 'left');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = header_transaksi.id_pelanggan', 'left');
        $this->db->join('rekening', 'rekening.id_rekening = header_transaksi.id_rekening', 'left');
        $this->db->group_by('header_transaksi.id_header_transaksi');
        $this->db->where('transaksi.kode_transaksi', $kode_transaksi);
        $query = $this->db->get();
        return $query->row_array();
    }
    //detail header_transaksi
    public function detail($id_header_transaksi)
    {
        $this->db->select('*');
        $this->db->from('header_transaksi');
        $this->db->where('id_header_transaksi', $id_header_transaksi);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function edit($data)
    {
        $this->db->where('id_header_transaksi', $data['id_header_transaksi']);
        $this->db->update('header_transaksi', $data);
    }
}
