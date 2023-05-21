<?php

namespace App\Controllers;
use App\Models\KeranjangModel;
class TentangController extends BaseController
{
    public function tentang()
    {
        $keran=new KeranjangModel();
        $data['jumlah_item'] = $keran->getTotalBarang();
        return view('tentangkami',$data);
    }
}
