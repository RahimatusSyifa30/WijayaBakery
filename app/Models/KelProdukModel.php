<?php

namespace App\Models;

use CodeIgniter\Model;

class KelProdukModel extends Model
{
    protected $table      = 'kelompok_produk';
    protected $primaryKey = 'nama_kel';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama_kel','gambar_kel'];
    public function viewAll(){
        return $this->findAll();
    }
    public function getKelProdukById($id){
        return $this->find($id);
    }
    public function insert_KelProduk($data){
        return $this->insert($data);
    }
    public function update_KelProduk($id,$data){
        return $this->update($id,$data);
    }
    public function delete_KelProduk($id){
        return $this->delete($id);
    }
}