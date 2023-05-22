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
        $sql='SELECT produk.nama_produk,kuantitas,sub_total,modal_produk,harga_produk FROM detail_pesanan JOIN produk ON produk.id_produk = detail_pesanan.id_produk WHERE id_pesanan='.$id;
        $data=$db->query($sql);
        $data=$data->getResultArray();
        return $data;
    }
    public function getJoinPesanan($nama){
        $db=db_connect();
        $sql="SELECT pesanan.id_pesanan,id_produk FROM detail_pesanan JOIN pesanan ON pesanan.id_pesanan = detail_pesanan.id_pesanan WHERE nama_pelanggan='".$nama."'";
        $data=$db->query($sql);
        $data=$data->getResultArray();
        return $data;
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
    public function delete_detail_pesanan($id){
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