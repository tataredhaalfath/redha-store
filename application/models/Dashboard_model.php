<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //total produk
    public function total_produk()
    {
        $this->db->select('COUNT(*) AS total');
        $this->db->from('produk');
        $query = $this->db->get();
        return $query->row();
    }

    //total kategori
    public function total_kategori()
    {
        $this->db->select('COUNT(*) AS total');
        $this->db->from('kategori');
        $query = $this->db->get();
        return $query->row();
    }
    //total pelanggan
    public function total_pelanggan()
    {
        $this->db->select('COUNT(*) AS total');
        $this->db->from('pelanggan');
        $query = $this->db->get();
        return $query->row();
    }

    //total header transaksi
    public function total_header_transaksi()
    {
        $this->db->select('COUNT(*) AS total');
        $this->db->from('header_transaksi');
        $query = $this->db->get();
        return $query->row();
    }

    //total header transaksi terkonfirmasi
    public function total_header_transaksi_konfirmasi()
    {
        $this->db->select('COUNT(*) AS total');
        $this->db->from('header_transaksi');
        $this->db->where('status_bayar', 'Konfirmasi');
        $query = $this->db->get();
        return $query->row();
    }

    //total transaksi 
    public function total_transaksi()
    {
        $this->db->select('SUM(transaksi.total_harga) AS total');
        $this->db->from('transaksi');
        $query = $this->db->get();
        return $query->row();
    }
    //total transaksi konfirmasi
    public function total_transaksi_konfirmasi()
    {
        $this->db->select('SUM(transaksi.total_harga) AS total');
        $this->db->from('transaksi');
        $this->db->join('header_transaksi', 'header_transaksi.kode_transaksi = transaksi.kode_transaksi');
        $this->db->where('header_transaksi.status_bayar', 'Konfirmasi');
        $query = $this->db->get();
        return $query->row();
    }

    //total berita
    public function total_berita()
    {
        $this->db->select('COUNT(*) AS total');
        $this->db->from('berita');
        $query = $this->db->get();
        return $query->row();
    }

    //total rekening
    public function total_rekening()
    {
        $this->db->select('COUNT(*) AS total');
        $this->db->from('rekening');
        $query = $this->db->get();
        return $query->row();
    }
}
