<?php

namespace App\Controllers;
use App\Models\KontakModel;

use App\Models\KeranjangModel;

class KontakController extends BaseController
{
    public function index(){
        $keran=new KeranjangModel();
        $data['jumlah_item'] = $keran->getTotalBarang();
        return view('kontakkami',$data);
    }
    public function kirim_pesan(){
        $kontak = new KontakModel();
        $nama = $this->request->getPost('nama');
        $pesan = $this->request->getPost('pesan');
        $url = $kontak->pertanyaan_WA($nama,$pesan);
        return redirect()->to($url);
    }
}