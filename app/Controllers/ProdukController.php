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
        $pro = new ProdukModel();
        $kel_pro = new KelProdukModel();
        $keran = new KeranjangModel();
        $cari = $this->request->getPost('cari');
        if ($cari) {
            $model = $pro->search($cari);
            session()->setFlashdata('notif','Mencari produk '.$cari);
        } else {
            $model = $pro;
        }
        $data = [
            'kel_produk' => $kel_pro->viewAll(),
            'produk' => $model->orderBy('stok_produk', 'DESC')->paginate(8, 'produk'),
            'jumlah_item' => $keran->getTotalBarang(),
            'pager' => $pro->pager,

        ];
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
