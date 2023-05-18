<?php

namespace App\Controllers;
use App\Models\KeranjangModel;

class AdminKeranjangController extends BaseController
{
    public function index(){
        $keran = new KeranjangModel();
        $data['jumlah_item'] = $keran->getTotalBarang();
        $data['isi_ker'] = $keran->viewAll();
        $data['total_harga'] = $keran->totalHarga();
        helper('form');
        echo view('admin/admin_keranjang',$data);
    }
    public function tambah_keranjang(){
        $keran = new KeranjangModel();
        $id      = $this->request->getPost('id');
        $qty     = 1;
        $price   = $this->request->getPost('price');
        $nama_prod=$this->request->getPost('name');
        $stok = $this->request->getPost('stok');
        $gambar = $this->request->getPost('gambar');
 

         $keran->insert_keranjang($id,$qty,$price,$nama_prod,$stok,$gambar);
        session()->setFlashdata('pesan','Produk '.$nama_prod.' berhasil dimasukkan ke keranjang');
        return redirect('admin/produk');
    }
    public function update_keranjang(){
        $keran = new KeranjangModel();
        $cart = $keran->viewAll();
        $i=1;
        foreach ($cart as $value):
            $array=[
                'rowid'      => $value['rowid'],
                'qty'     => $this->request->getPost('qty'.$i++),
                
            ];
             $keran->update_keranjang($array);
        endforeach;
        session()->setFlashdata('pesan','Berhasil mengubah semua produk dalam keranjang');
        return redirect('admin/keranjang');

    }
    public function hapus_keranjang($id){
        $keran = new KeranjangModel();
        $keran->delete_keranjang($id);
        session()->setFlashdata('pesan','Berhasil menghapus salah satu produk dalam keranjang');
        return redirect('admin/keranjang');

    }
    public function hapus_isi_keranjang(){
        $keran = new KeranjangModel();
        $keran->delete_semua_keranjang();
        session()->setFlashdata('pesan','Berhasil menghapus semua produk dalam keranjang');
        return redirect('admin/keranjang');

    }
}