<?php

namespace App\Controllers;
use App\Models\PesananModel;
use App\Models\DetailPesananModel;
use App\Models\KeranjangModel;

class AdminRiwayatController extends BaseController
{
    public function index(){
        helper('form');
        $keran=new KeranjangModel();
        $data['jumlah_item'] = $keran->getTotalBarang();
        $pes= new PesananModel();
        $detail_pes = new DetailPesananModel();
        $data['pesanan_selesai']=$pes->view_selesai();
        $counter=0;
        foreach($data['pesanan_selesai'] as $tes){
            $data['join_pro'][$counter] = $detail_pes->getJoinProdukById($tes['id_pesanan']);
            $counter++;
        }
        return view('admin/admin_riwayat_trs',$data);
    }
}