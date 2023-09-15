<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminKeranjangModel extends Model
{
    private $cart;
    public function __construct()
    {
        $this->cart = \Config\Services::cart();
    }
    public function viewAll()
    {
        $keranjang = $this->cart->contents();
        return $keranjang;
    }
    public function insert_keranjang($data)
    {
        $this->cart->insert($data);
    }
    public function update_keranjang($data)
    {
        return $this->cart->update($data);
    }
    public function delete_keranjang($id)
    {
        $this->cart->remove($id);
    }
    public function delete_semua_keranjang()
    {
        $this->cart->destroy();
    }
    public function getTotalBarang()
    {
        $jumlah_item = 0;
        $keranjang = $this->cart->contents();
        foreach ($keranjang as $ker) :
            $jumlah_item = $jumlah_item + $ker['qty'];

        endforeach;
        return $jumlah_item;
    }
    public function totalModal()
    {
        $jumlah = 0;
        $keranjang = $this->cart->contents();
        foreach ($keranjang as $ker) :
            $jumlah = $jumlah + ($ker['options']['modal'] * $ker['qty']);

        endforeach;
        return $jumlah;
    }
    public function totalHarga()
    {
        $keranjang = $this->cart->total();
        return $keranjang;
    }
}
