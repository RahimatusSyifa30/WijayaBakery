<?php

namespace App\Controllers;
use App\Models\LaporanModel;
use App\Models\ProdukModel;
use App\Models\PesananModel;
use App\Models\DetailPesananModel;
use App\Models\KeranjangModel;
use Exception;

class AdminDetailPesananController extends BaseController
{
    public function insert_detail_pesanan(){
        $keran = new KeranjangModel();
        $produk = new ProdukModel();
        $pes = new PesananModel();
        $detail_pes = new DetailPesananModel();
        $nama_pel = $this->request->getPost('nama_pel');
        $data_pesan=$pes->getPesananByName( $nama_pel);
        $id_pesan=$data_pesan['id_pesanan'];
        foreach($keran->viewAll() as $detail){
            $data_produk=$produk->getProdukByName( $detail['name']);
            $nama=$data_produk['nama_produk'];
            $id=$data_produk['id_produk'];
            if($detail_pes->cekDuplikatBarang($id_pesan,$id)){
                session()->setFlashdata('error','Produk '.$nama.' sudah ada di dalam pesanan');
                return redirect('admin/keranjang');
            }else{
                $array_detail = [
                    'id_pesanan' => $id_pesan,
                    'id_produk' => $id,
                    'kuantitas' => $detail['qty'],
                    'sub_total' => $detail['subtotal'],
                ];
                $total = $data_pesan['total_harga']+$keran->totalHarga();
                $array_pesan = [
                    'total_harga'=>$total
                ];
                $detail_pes->insert_detail_pesanan($array_detail);
                $pes->update_pesanan($id_pesan,$array_pesan);
            }
            $keran->delete_semua_keranjang();
            session()->setFlashdata('notif','Data pelanggan atas nama '.$nama_pel.' berhasil diubah');
            return redirect('admin');
        } 
    }
    public function delete_detail_pesanan($id){
        $produk = new ProdukModel();
        $detail_pes = new DetailPesananModel();
        $data=$produk->getProdukById($id);
        $nama = $data['nama_produk'];
        $detail_pes->delete_detail_pesananByIdProduk($id);
        session()->setFlashdata('notif','Produk '.$nama.' berhasil dihapus dari pesanan');
        return redirect()->back();
    }
}