<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailPesananModel extends Model
{
    protected $table      = 'detail_pesanan';
    protected $primaryKey = 'id_detail';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_pesanan','id_detail','id_produk','kuantitas','sub_modal','sub_total'];
    public function viewAll(){
        return $this->findAll();
    }
    public function getDetailByIdPesanan($id){
        return $this->where('id_pesanan',$id)->findAll();
    }
    public function getJoinProdukById($id){
        $db=db_connect();
        $sql='SELECT produk.id_produk,nama_produk,kuantitas,sub_total,modal_produk,harga_produk FROM detail_pesanan JOIN produk ON produk.id_produk = detail_pesanan.id_produk WHERE id_pesanan='.$id;
        $data=$db->query($sql);
        $data=$data->getResultArray();
        return $data;
    }

    public function cekDuplikatBarang($orderId, $itemId)
    {
        $query = $this->db->table('detail_pesanan')
            ->where('id_pesanan', $orderId)
            ->where('id_produk', $itemId)
            ->countAllResults();

        return $query > 0;
    }
    public function getSubTotal($a,$b){
        return $a*$b;
    }

    public function insert_detail_pesanan($data){
        $this->insert($data);
    }
    public function update_detail_pesanan($id,$data){
        return $this->where('id_detail',$id)->update($data);
    }
    public function delete_detail_pesananByIdProduk($id){
        $this->where('id_produk',$id)->delete();
    }
    public function delete_detail_pesananByIdPesanan($id){
        $this->where('id_pesanan',$id)->delete();
    }
    public function totalDetailPesanan(){
        $db=db_connect();
        $sql='SELECT COUNT(id_pesanan) FROM detail_pesanan';
        $data=$db->query($sql);
        $data=$data->getResult();
        return $data;
    }
}