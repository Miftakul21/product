<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    protected $allowedFields = ['nama_produk', 'harga', 'kategori_id', 'status_id'];

    function getProdukStatus($id = null){
        $query = '';

        if(is_null($id)) {
            $query = $this->db->table('produk AS a')
                    ->select('a.id_produk')->select('a.nama_produk')->select('a.harga')
                    ->select('b.nama_kategori')->select('c.nama_status')
                    ->join('kategori as b', 'a.kategori_id = b.id_kategori', 'LEFT')
                    ->join('status as c', 'a.status_id = c.id_status', 'LEFT')
                    ->like('c.nama_status', 'Bisa dijual')
                    ->orderBy('a.id_produk', 'ASC')
                    ->get()->getResult();
        } else {
            $query = $this->db->table('produk AS a')
                    ->select('a.id_produk')->select('a.nama_produk')->select('a.harga')
                    ->select('b.nama_kategori')->select('c.nama_status')
                    ->join('kategori as b', 'a.kategori_id = b.id_kategori', 'LEFT')
                    ->join('status as c', 'a.status_id = c.id_status', 'LEFT')
                    ->where('c.id_status', $id)
                    ->orderBy('a.id_produk', 'ASC')
                    ->get()->getResult();
        }

        return $query;
    }

    function getProduk($id = null)
    {
        $query = '';
        if(is_null($id)) {
            $query = $this->db->table('produk AS a')
                    ->select('a.id_produk')->select('a.nama_produk')->select('a.harga')
                    ->select('b.nama_kategori')->select('c.nama_status')
                    ->join('kategori as b', 'a.kategori_id = b.id_kategori', 'LEFT')
                    ->join('status as c', 'a.status_id = c.id_status', 'LEFT')
                    ->orderBy('a.id_produk', 'ASC')
                    ->get()->getResult();
        } else {
            $query = $this->db->table('produk AS a')
                    ->select('a.id_produk')->select('a.nama_produk')->select('a.harga')
                    ->select('a.kategori_id')->select('a.status_id')->select('b.nama_kategori')
                    ->select('c.nama_status')
                    ->join('kategori as b', 'a.kategori_id = b.id_kategori', 'LEFT')
                    ->join('status as c', 'a.status_id = c.id_status', 'LEFT')
                    ->where('a.id_produk', $id)
                    ->orderBy('a.id_produk', 'ASC')
                    ->get()->getResult();
        }
        
        return $query;
    }
}