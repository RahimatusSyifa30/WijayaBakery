<?php

namespace App\Controllers;
use App\Models\KontakUsModel;

use App\Models\KeranjangModel;

class KontakUsController extends BaseController
{
    public function index(){
        $keran=new KeranjangModel();
        $data['jumlah_item'] = $keran->getTotalBarang();
        return view('kontakkami',$data); //blm buat view ini
    }
    public function kirim_pesan(){
        $kontak = new KontakUsModel();
        $nama = $this->request->getPost('nama');
        $pesan = $this->request->getPost('pesan');
        $url = $kontak->pertanyaan_WA($nama,$pesan);
        return redirect()->to($url);
    }

    public function insert_kontak_us()
    {
        $pesan= new KontakUsModel();
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'nama_customer' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        if($isDataValid){
        $nama_pel = $this->request->getPost('nama_customer');
        $total=$pesan->totalKontakUs();
        $array=[
            'id_kontak_us' => $total,
            'nama_customer' => $nama_pel,
            'no_telp_customer' => $this->request->getPost('no_telp_customer'),
            'subjek_customer' => $this->request->getPost('subjek_customer'),
            'pesan_customer' => $this->request->getPost('pesan_customer'),
            
        ];
        $pesan->insert_kontak_us($array);
        
        return redirect('admin');
        }
    }
    //blm selesai
}