<?php

namespace App\Controllers;

use App\Models\KeranjangModel;

class IndexController extends BaseController
{
    public function index()
    {
        $keran = new KeranjangModel();
        $data['jumlah_item'] = $keran->getTotalBarang();
        return view('index', $data);
    }
}
