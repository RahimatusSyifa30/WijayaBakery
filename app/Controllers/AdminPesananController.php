<?php

namespace App\Controllers;
use App\Models\KontakModel;
use App\Models\LaporanModel;
use App\Models\ProdukModel;
use App\Models\PesananModel;
use App\Models\DetailPesananModel;
use App\Models\KeranjangModel;
use Exception;

class AdminPesananController extends BaseController
{
    public function index(){
        helper('form');
        $keran=new KeranjangModel();
        $pes= new PesananModel();
        $detail_pes = new DetailPesananModel();
        $data['pesanan_belum']=$pes->view_belum();
        $data['pesanan_diproses']=$pes->view_diproses();
        $data['jumlah_item'] = $keran->getTotalBarang();
        
        $counter=0;
        foreach($data['pesanan_belum'] as $tes){
            $data['join_pro'][$counter] = $detail_pes->getJoinProdukById($tes['id_pesanan']);
            $counter++;
        }
        $y=0;
        foreach($data['pesanan_diproses'] as $tes){
            $data['join_pro1'][$y] = $detail_pes->getJoinProdukById($tes['id_pesanan']);
            $y++;
        }     
        return view('admin/admin_pesanan1',$data);
    }

    public function insert_pesanan()
    {
        $t=time();
        $produk= new ProdukModel();
        $pes= new PesananModel();
        $detail_pes= new DetailPesananModel();
        $keran = new KeranjangModel();
        $isi_ker=$keran->viewAll();
        $data['jumlah_item'] = $keran->getTotalBarang();
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'nama_pel' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        if($isDataValid){
        $nama_pel = $this->request->getPost('nama_pel');
        $array1=[
            'nama_pelanggan' => $nama_pel,
            'tanggal' => date('Y-m-d H:i:sa',$t),
            'no_hp_pelanggan' => $this->request->getPost('no_hp'),
            'total_harga' => $keran->totalHarga(),
        ];
        $pes->insert_pesanan($array1);
        
        foreach($isi_ker as $detail){
            $data=$produk->getProdukByName( $detail['name']);
            $id=$data['id_produk'];
            
            
            $total=$pes->totalPesanan();
            $array = [
                'id_pesanan' => $total,
                'id_produk' => $id,
                'kuantitas' => $detail['qty'],
                'sub_modal' =>$detail['qty']*$data['modal_produk'],
                'sub_total' => $detail['subtotal'],
            ];
            
            $detail_pes->insert_detail_pesanan($array);
            $stok_baru = $data['stok_produk']-$detail['qty'];
            $array_stok=[
                'stok_produk' => $stok_baru
            ];
            
            
            $produk->update_Produk($id,$array_stok);
        }
        $to_modal = $detail_pes->getTotalModal($total);

        $array_modal = [
                
            'total_modal' => $to_modal,
        ];
        $pes->update_pesanan($total,$array_modal);
        $keran->delete_semua_keranjang();
        session()->setFlashdata('notif','Hai, '.$nama_pel.'!!! Pesanan berhasil dibuat. Silahkan menuju ke Wijaya Bakery untuk konfirmasi.');
        return redirect('admin');
        }
    }
    public function update_pesanan($id){

        $produk = new ProdukModel();
        $data['produk'] = $produk->viewAll();
        $pes= new PesananModel();
        $detail_pes= new DetailPesananModel();
        $data['pesanan']=$pes->getPesananById($id);
        
        $id_pesan=$data['pesanan']['id_pesanan'];
        $keran = new KeranjangModel();
        $data['jumlah_item'] = $keran->getTotalBarang();
        $data['join_pro'] = $detail_pes->getJoinProdukById($id_pesan);


        $validation =  \Config\Services::validation();
        $validation->setRules([
            'nama_pel' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        $nama_pel = $this->request->getPost('nama_pel');
        if($isDataValid){
            
            $no_hp = $this->request->getPost('no_hp');
            $array=[
                'nama_pelanggan' => $nama_pel,
                'no_hp_pelanggan' => $no_hp,
            ];
            $pes->update_pesanan($id,$array);

            session()->setFlashdata('notif','Data pelanggan atas nama '.$nama_pel.' berhasil diubah');
            return redirect('admin');
        }
        
        return view('admin/admin_edit_pesanan',$data);
    }
    public function delete_pesanan($id){
        $pes = new PesananModel();
        $detail_pes = new DetailPesananModel();
        $data=$pes->getPesananById($id);
        $nama = $data['nama_pelanggan'];
        $detail_pes->delete_detail_pesananByIdPesanan($id);
        $pes->delete_pesanan($id);
        session()->setFlashdata('notif','Pesanan atas nama '.$nama.' berhasil dihapus');
        return redirect('admin');
    }
    public function pesanan_diproses($id){
        $kontak = new KontakModel();
        $pesan = new PesananModel();
        $data = $pesan->getPesananById($id);
        $nama_pel = $data['nama_pelanggan'];
        $no_pel = $data['no_hp_pelanggan'];
        $pesan->pesanan_diproses($id);
        $url = $kontak->pesanan_diproses_WA($no_pel,$nama_pel);
        session()->setFlashdata('notif','Hai, '.$nama_pel.'!!! Pesanan sedang diproses.');
        return redirect('admin')->to($url);

    }
    public function pesanan_selesai($id){
        $t=time();
        $kontak = new KontakModel();
        $laporan= new LaporanModel();
        $pesan = new PesananModel();
        $data = $pesan->getPesananById($id);
        $nama_pel = $data['nama_pelanggan'];
        $no_pel = $data['no_hp_pelanggan'];
        $modal = $data['total_modal'];
        $untung_kotor = $data['total_harga'];
        $untung_bersih = $data['total_harga']-$data['total_modal'];
        $pesan->pesanan_selesai($id);
        $array=[
            'id_pesanan'=>$id,
            'tanggal_laporan' => date('Y-m-d H:i:sa',$t),
            'modal'=>$modal,
            'keuntungan_kotor'=>$untung_kotor,
            'keuntungan_bersih'=>$untung_bersih,
        ];
        $laporan->insert_laporan($array);
        $url = $kontak->pesanan_selesai_WA($no_pel,$nama_pel);
        session()->setFlashdata('notif','Hai, '.$nama_pel.'!!! Pesanan sudah selesai. Selamat Menikmati');
        return redirect('admin')->to($url);
    }
    
}