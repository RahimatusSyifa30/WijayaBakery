<?php

namespace App\Models;

use CodeIgniter\Model;
class KeranjangModel extends Model
{
    private $cart1;
    public function __construct(){
        $this->cart1=\Config\Services::cart();
    }
    public function viewAll(){
        $keranjang=$this->cart1->contents();
        return $keranjang;
    }
    public function insert_keranjang($id,$qty,$price,$name,$stok,$gambar){
        $this->cart1->insert(array(
            'id'=>$id,
            'qty'=>$qty,
            'price'=>$price,
            'name'=>$name,
            'options' =>array(
                'stok' => $stok,
                'gambar' => $gambar,
            )
            
        ));
        
    }
    public function update_keranjang($data){
        return $this->cart1->update($data);
    }
    public function delete_keranjang($id){
        $this->cart1->remove($id);
    }
    public function delete_semua_keranjang(){
        $this->cart1->destroy();
    }
    public function getTotalBarang(){
        $jumlah_item = 0;
        $keranjang=$this->cart1->contents();
        foreach ($keranjang as $ker):
          $jumlah_item = $jumlah_item + $ker['qty'];
        
        endforeach;
        return $jumlah_item;
    }
    public function totalHarga(){

        $keranjang=$this->cart1->total();
        return $keranjang;
    }
}