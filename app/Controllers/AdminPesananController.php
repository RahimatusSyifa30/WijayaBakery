<?php

namespace App\Controllers;
use App\Models\ProdukModel;
use App\Models\PesananModel;
use App\Models\DetailPesananModel;
use App\Models\KeranjangModel;

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
        foreach($data['pesanan_diproses'] as $tes){
            $data['join_pro1'][$counter] = $detail_pes->getJoinProdukById($tes['id_pesanan']);
            $counter++;
        }
        return view('admin/admin_pesanan',$data);
    }

    public function insert_pesanan()
    {
        $produk= new ProdukModel();
        $pes= new PesananModel();
        $detail_pes= new DetailPesananModel();
        $keran = new KeranjangModel();
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
            'no_hp_pelanggan' => $this->request->getPost('no_hp'),
            'total_harga' => $keran->totalHarga(),
        ];
        $pes->insert_pesanan($array1);
        
        foreach($keran->viewAll() as $detail){
            $data=$produk->getProdukByName( $detail['name']);
            $id=$data['id_produk'];
            $total=$pes->totalPesanan();
            $array = [
                'id_pesanan' => $total,
                'id_produk' => $id,
                'kuantitas' => $detail['qty'],
                'sub_total' => $detail['subtotal'],
            ];
            $detail_pes->insert_detail_pesanan($array);
        }
        $keran->delete_semua_keranjang();
        session()->setFlashdata('pesan','Hai, '.$nama_pel.'!!! Pesanan berhasil dibuat. Silahkan menuju ke Wijaya Bakery untuk konfirmasi.');
        return redirect('admin');
        }
    }
    public function pesanan_diproses($id){
        $pesan = new PesananModel();
        $data = $pesan->getPesananById($id);
        $nama_pel = $data['nama_pelanggan'];
        $pesan->pesanan_diproses($id);
        session()->setFlashdata('pesan','Hai, '.$nama_pel.'!!! Pesanan sedang diproses.');
        return redirect('admin');
    }
    public function pesanan_selesai($id){
        $pesan = new PesananModel();
        $data = $pesan->getPesananById($id);
        $nama_pel = $data['nama_pelanggan'];
        $pesan->pesanan_selesai($id);
        session()->setFlashdata('pesan','Hai, '.$nama_pel.'!!! Pesanan sudah selesai. Selamat Menikmati');
        return redirect('admin');
    }
    public function delete_pesanan($id){
        $pes = new PesananModel();
        $detail_pes = new DetailPesananModel();
        $data=$pes->getPesananById($id);
        $nama = $data['nama_pelanggan'];
        $detail_pes->delete_detail_pesanan($id);
        $pes->delete_pesanan($id);
        session()->setFlashdata('pesan','Pesanan atas nama '.$nama.' berhasil dihapus');
        return redirect('admin');
    }
    public function pilih_pesanan(){
        helper('form');
        $produk = new ProdukModel();
        $keran = new KeranjangModel();
        $data['jumlah_item'] = $keran->getTotalBarang();
        $data['produk']=$produk->findAll();
        echo view('admin/admin_pilih_pesanan',$data);
    }
    
}