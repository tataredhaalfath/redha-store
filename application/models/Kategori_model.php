<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function listing()
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->order_by('id_kategori', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function tambah($data)
    {
        $this->db->insert('kategori', $data);
    }
    public function delete($data)
    {
        $this->db->where('id_kategori', $data['id_kategori']);
        $this->db->delete('kategori', $data);
    }
    //detail kategori
    public function detail($id_kategori)
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->where('id_kategori', $id_kategori);
        $query = $this->db->get();
        return $query->row_array();
    }
    //detail kategori
    public function read($slug_kategori)
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->where('slug_kategori', $slug_kategori);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function edit($data)
    {
        $this->db->where('id_kategori', $data['id_kategori']);
        $this->db->update('kategori', $data);
    }

    public function login($kategoriname, $password)
    {
        $this->db->where('kategoriname', $kategoriname);
        $data = $this->db->get('kategori')->row_array();

        if ($data) {
            if (password_verify($password, $data['password'])) {
                return $this->db->get_where('kategori', ['kategoriname' => $kategoriname])->row_array();
            }
        }
    }

    // listing kategori dengan stok
    public function listingstok()
    {
        $this->db->select(' produk.*,
                            user.nama,
                            kategori.nama_kategori,
                            kategori.slug_kategori,
                            COUNT(gambar.id_gambar) AS total_gambar');
        $this->db->from('produk');
        //join 
        $this->db->join('user', 'user.id_user = produk.id_user', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
        $this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
        //end join
        $this->db->group_by('produk.id_produk');
        $this->db->order_by('id_produk', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }
}
