<?php

namespace App\Controllers;
use App\Models\KeranjangModel;
use App\Models\ProdukModel;
use App\Models\KelProdukModel;

use Codeigniter\RESTful\ResourceController;
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
        $keran=new KeranjangModel();
        $data['jumlah_item'] = $keran->getTotalBarang();
        // return $this->respond($data);
        echo view('produk',$data);
    }
}
