<?php

namespace App\Models;

use CodeIgniter\Model;
class KeranjangModel extends Model
{
    private $cart;
    public function __construct(){
        $this->cart=\Config\Services::cart();
    }
    public function viewAll(){
        $keranjang=$this->cart->contents();
        return $keranjang;
    }
    public function insert_keranjang($id,$qty,$price,$name,$stok,$gambar){
        $this->cart->insert(array(
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
        return $this->cart->update($data);
    }
    public function delete_keranjang($id){
        $this->cart->remove($id);
    }
    public function delete_semua_keranjang(){
        $this->cart->destroy();
    }
    public function getTotalBarang(){
        $jumlah_item = 0;
        $keranjang=$this->cart->contents();
        foreach ($keranjang as $ker):
          $jumlah_item = $jumlah_item + $ker['qty'];
        
        endforeach;
        return $jumlah_item;
    }
    public function totalHarga(){

        $keranjang=$this->cart->total();
        return $keranjang;
    }
    public function cekBarangSudahAda($nama,$nama1){
        if($nama == $nama1){
            return false;
        }else{
            return true;
        }

    }

}