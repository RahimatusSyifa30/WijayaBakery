<?php

namespace App\Controllers;

use App\Models\KelProdukModel;
use App\Models\KeranjangModel;
use App\Models\ProdukModel;
use CodeIgniter\API\ResponseTrait;

class ProdukController extends BaseController
{
    use ResponseTrait;
    public function produk()
    {
        helper('form');
        $produk = new ProdukModel();
        $jenis_produk = new KelProdukModel();
        $data['kel_produk'] = $jenis_produk->findAll();
        $data['produk'] = $produk->viewAll();
        $keran = new KeranjangModel();
        $data['jumlah_item'] = $keran->getTotalBarang();
        echo view('produk', $data);
    }
    public function detail_produk($nama)
    {
        helper('form');
        $tes = str_replace("-", " ", $nama);
        $produk = new ProdukModel();
        $jenis_produk = new KelProdukModel();
        $keran = new KeranjangModel();
        $data = [
            'kel_produk' => $jenis_produk->findAll(),
            'pro' => $produk->getProdukByName($tes),
            'jumlah_item' => $keran->getTotalBarang()
        ];
        echo view('detail_produk', $data);
    }
}
