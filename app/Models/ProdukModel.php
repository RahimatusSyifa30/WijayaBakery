<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table      = 'produk';
    protected $primaryKey = 'id_produk';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_produk', 'nama_produk', 'jenis_produk', 'stok_produk', 'modal_produk', 'harga_produk', 'informasi_produk', 'gambar_produk'];
    public function viewAll()
    {
        $db = db_connect();
        $sql = "SELECT * FROM produk  ORDER BY stok_produk DESC";
        $query = $db->query($sql);
        $result = $query->getResultArray();
        return $result;
    }
    public function getProdukById($id)
    {
        $db = db_connect();
        $sql = "SELECT * FROM produk JOIN kelompok_produk ON produk.jenis_produk=kelompok_produk.id_kel WHERE id_produk=" . $id . " ORDER BY stok_produk DESC";
        $query = $db->query($sql);
        $result = $query->getResult();
        return $result;
    }
    public function getIDProdukByName($nama)
    {
        $db = db_connect();
        $sql = "SELECT id_produk FROM produk where nama_produk='" . $nama . "'";
        $stat = $db->query($sql);
        return $stat->getResult();
    }
    public function getProdukByName($nama)
    {
        $db = db_connect();
        $sql = "SELECT * FROM produk JOIN kelompok_produk ON produk.jenis_produk=kelompok_produk.id_kel WHERE nama_produk='" . $nama . "'";
        $query = $db->query($sql);
        $result = $query->getResultArray();
        return $result;
    }
    public function insert_Produk($data)
    {
        return $this->insert($data);
    }
    public function update_Produk($id, $data)
    {
        return $this->update($id, $data);
    }
    public function update_stok_Produk($id, $stok)
    {
        return $this->where('id_produk', $id)->set('stok_produk', $stok);
    }
    public function delete_Produk($id)
    {
        return $this->delete($id);
    }
    public function updateStok_jikakurangdarinol()
    {
        $db = db_connect();
        $sql = "UPDATE produk SET stok_produk=0 WHERE stok_produk<0";
        return $db->query($sql);
    }
}
