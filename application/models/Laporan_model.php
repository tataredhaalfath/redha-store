<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{
    public function lap_harian($tanggal, $bulan, $tahun)
    {
        $konfirmasi = 'Konfirmasi';
        $this->db->select('transaksi.*,produk.*');
        $this->db->from('transaksi');
        $this->db->join('produk', 'transaksi.id_produk = produk.id_produk');
        $this->db->join('header_transaksi', 'header_transaksi.kode_transaksi = transaksi.kode_transaksi');
        $this->db->where('header_transaksi.status_bayar', $konfirmasi);
        $this->db->where('DAY(transaksi.tanggal_transaksi)', $tanggal);
        $this->db->where('MONTH(transaksi.tanggal_transaksi)', $bulan);
        $this->db->where('YEAR(transaksi.tanggal_transaksi)', $tahun);
        return $this->db->get()->result_array();
    }

    public function lap_bulanan($bulan, $tahun)
    {
        $konfirmasi = 'Konfirmasi';
        $this->db->select('transaksi.*,produk.*');
        $this->db->from('transaksi');
        $this->db->join('produk', 'transaksi.id_produk = produk.id_produk');
        $this->db->join('header_transaksi', 'header_transaksi.kode_transaksi = transaksi.kode_transaksi');
        $this->db->where('header_transaksi.status_bayar', $konfirmasi);
        $this->db->where('MONTH(transaksi.tanggal_transaksi)', $bulan);
        $this->db->where('YEAR(transaksi.tanggal_transaksi)', $tahun);
        return $this->db->get()->result_array();
    }
    public function lap_tahunan($tahun)
    {
        $konfirmasi = 'Konfirmasi';
        $this->db->select('transaksi.*,produk.*');
        $this->db->from('transaksi');
        $this->db->join('produk', 'transaksi.id_produk = produk.id_produk');
        $this->db->join('header_transaksi', 'header_transaksi.kode_transaksi = transaksi.kode_transaksi');
        $this->db->where('header_transaksi.status_bayar', $konfirmasi);
        $this->db->where('YEAR(transaksi.tanggal_transaksi)', $tahun);
        return $this->db->get()->result_array();
    }
}
