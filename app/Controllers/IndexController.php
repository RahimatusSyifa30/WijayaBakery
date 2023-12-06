<?php

namespace App\Controllers;

use App\Models\KeranjangModel;
use App\Models\ProdukModel;

class IndexController extends BaseController
{
    public function index()
    {
        $keran = new KeranjangModel();
        $pro = new ProdukModel();
        $data = [
            'jumlah_item' => $keran->getTotalBarang(),
            'produk' => $pro->viewAllLimit7()
        ];
        return view('index', $data);
    }
}
