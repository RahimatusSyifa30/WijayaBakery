<?php

namespace App\Controllers;
use App\Models\KontakUsModel;

use Exception;

class AdminKontakUsController extends BaseController
{
    public function index(){
        helper('form');
        $pesan= new KontakUsModel();
        $data['pesanan_belum']=$pesan->view_belum_dibaca();
        
        return view('admin/admin_kontak_us',$data); //blm buat view ini
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
        $pesan->insert_kontak_us($array1);
        
        return redirect('admin');
        }
    }
    //blm selesai
}