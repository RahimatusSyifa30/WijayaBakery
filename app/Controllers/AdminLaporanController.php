<?php

namespace App\Controllers;
use App\Models\PesananModel;
use App\Models\DetailPesananModel;
use App\Models\KeranjangModel;

class AdminLaporanController extends BaseController
{ 
    public function index(){
        

        helper('form');
        $keran=new KeranjangModel();
        $data['jumlah_item'] = $keran->getTotalBarang();

        $pes= new PesananModel();
        $detail_pes = new DetailPesananModel();
        
            $data['pesanan_filter']=$pes->view_selesai();
            $counter=0;
            foreach($data['pesanan_filter'] as $tes){
                $data['join_pro'][$counter] = $detail_pes->getJoinProdukById($tes['id_pesanan']);
                $counter++;
            }
        return view('admin/admin_laporan',$data);
    }
public function filter_laporan(){
    setlocale(LC_TIME,'IND');
    helper('form');
        $keran=new KeranjangModel();
        $data['jumlah_item'] = $keran->getTotalBarang();

        $pes= new PesananModel();
        $detail_pes = new DetailPesananModel();
    $start=$this->request->getPost('start');
        $end=$this->request->getPost('end');
        if($start > $end){
            session()->setFlashdata('error',"Tanggal awal tidak boleh melebihi tanggal akhir");
            $data['pesanan_filter']=$pes->view_selesai();
            $counter=0;
            foreach($data['pesanan_filter'] as $tes){
                $data['join_pro'][$counter] = $detail_pes->getJoinProdukById($tes['id_pesanan']);
                $counter++;
            }
            session()->setFlashdata('error',"Tanggal awal dan akhir tidak boleh kosong");
        }else if ($start!=null && $end!=null) {
                
                $data['pesanan_filter']=$pes->filter_pesanan($start,$end);
                $counter=0;
                foreach($data['pesanan_filter'] as $tes){
                    $data['join_pro'][$counter] = $detail_pes->getJoinProdukById($tes['id_pesanan']);
                    $counter++;
                }     
                $awal = strftime('%d %B %Y', strtotime($start));
                $akhir = strftime('%d %B %Y', strtotime($end));
                session()->setFlashdata('notif',"Menampilkan tanggal dari ".$awal." sampai ".$akhir);
        }else{
            session()->setFlashdata('error',"Tanggal tidak boleh kosong");
            return redirect()->back();
           
            

} 
return view('admin/admin_laporan',$data);
}
}