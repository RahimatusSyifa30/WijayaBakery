<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table      = 'produk';
    protected $primaryKey = 'id_produk';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_produk', 'nama_produk','jenis_produk','stok_produk','modal_produk','harga_produk','informasi_produk','gambar_produk'];
    public function viewAll(){
        return $this->findAll();
    }
    public function getProdukById($id){
        return $this->find($id);
    }
    public function getProdukByName($nama){
        return $this->where('nama_produk',$nama)->first();
    }
    public function insert_Produk($data){
        return $this->insert($data);
    }
    public function update_Produk($id,$data){
        return $this->update($id,$data);
    }
    public function delete_Produk($id){
        return $this->delete($id);
    }
}