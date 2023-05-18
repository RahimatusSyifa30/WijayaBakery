<?php

namespace App\Controllers;
use App\Models\KeranjangModel;
class KontakController extends BaseController
{
    public function kontak()
    {
        $keran=new KeranjangModel();
        $data['jumlah_item'] = $keran->getTotalBarang();
        return view('kontak',$data);
    }
}
