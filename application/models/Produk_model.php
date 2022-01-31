<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function listing()
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
    public function home()
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
        $this->db->where('produk.status_produk', "Publish");
        $this->db->group_by('produk.id_produk');
        $this->db->order_by('id_produk', 'desc');
        $this->db->limit(18);
        $query = $this->db->get();
        return $query->result_array();
    }
    //produk related
    public function related($kat)
    {
        $this->db->select('produk.*,
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
        $this->db->where('kategori.id_kategori', $kat);
        $this->db->where('produk.status_produk', "Publish");
        $this->db->group_by('produk.id_produk');
        $this->db->order_by('id_produk', 'desc');
        $this->db->limit(4);
        $query = $this->db->get();
        return $query->result_array();
    }
    //read produk
    public function read($slug_produk)
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
        $this->db->where('produk.status_produk', "Publish");
        $this->db->where('produk.slug_produk', $slug_produk);
        $this->db->group_by('produk.id_produk');
        $this->db->order_by('id_produk', 'desc');
        $query = $this->db->get();
        return $query->row_array();
    }
    public function tambah($data)
    {
        $this->db->insert('produk', $data);
    }
    public function delete($data)
    {
        $this->db->where('id_produk', $data['id_produk']);
        $this->db->delete('produk', $data);
    }
    //Produk
    public function produk($limit, $start)
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
        $this->db->where('produk.status_produk', "Publish");
        $this->db->group_by('produk.id_produk');
        $this->db->order_by('id_produk', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }
    //Total Produk
    public function total_produk()
    {
        $this->db->select('COUNT(*)AS total');
        $this->db->from('produk');
        $this->db->where('status_produk', 'Publish');
        $query = $this->db->get();
        return $query->row_array();
    }

    //Kategori Produk
    public function kategori($id_kategori, $limit, $start)
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
        $this->db->where('produk.status_produk', "Publish");
        $this->db->where('produk.id_kategori', $id_kategori);
        $this->db->group_by('produk.id_produk');
        $this->db->order_by('id_produk', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }
    //Total kategori Produk
    public function total_kategori($id_kategori)
    {
        $this->db->select('COUNT(*)AS total');
        $this->db->from('produk');
        $this->db->where('status_produk', 'Publish');
        $this->db->where('id_kategori', $id_kategori);
        $query = $this->db->get();
        return $query->row_array();
    }

    //listing kategori
    public function listing_kategori()
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
        $this->db->group_by('produk.id_kategori');
        $this->db->order_by('id_produk', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }
    //detail produk
    public function detail($id_produk)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->where('id_produk', $id_produk);
        $this->db->order_by('id_produk', 'desc');
        $query = $this->db->get();
        return $query->row_array();
    }
    public function edit($data)
    {
        $this->db->where('id_produk', $data['id_produk']);
        $this->db->update('produk', $data);
    }

    //tambah gambar
    public function tambah_gambar($data)
    {
        $this->db->insert('gambar', $data);
    }
    public function gambar($id_produk)
    {
        $this->db->select('*');
        $this->db->from('gambar');
        $this->db->where('id_produk', $id_produk);
        $this->db->order_by('id_gambar', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }
    //detail gambar
    public function detail_gambar($id_gambar)
    {
        $this->db->select('*');
        $this->db->from('gambar');
        $this->db->where('id_gambar', $id_gambar);
        $this->db->order_by('id_gambar', 'desc');
        $query = $this->db->get();
        return $query->row_array();
    }
    //delete gambar
    public function delete_gambar($data)
    {
        $this->db->where('id_gambar', $data['id_gambar']);
        $this->db->delete('gambar', $data);
    }
}
