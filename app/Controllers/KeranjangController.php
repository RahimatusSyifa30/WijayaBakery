<?php

namespace App\Controllers;

use App\Models\KeranjangModel;
use App\Models\PesananModel;
use App\Models\ProdukModel;

class KeranjangController extends BaseController
{
    public function index()
    {
        helper('form');
        $pesanan = new PesananModel();
        $keran = new KeranjangModel();
        $data = [
            'pesanan' => $pesanan->view_belum(),
            'jumlah_item' => $keran->getTotalBarang(),
            'isi_ker' => $keran->viewAll(),
            'total_harga' => $keran->totalHarga()
        ];
        if (session()->get('isLoggedIn') or session()->get('isLoggedInAdmin')) {
            echo view('keranjang', $data);
        } else {
            session()->setFlashData('error', 'Login terlebih dahulu untuk melihat isi keranjang');
            return redirect('login');
        }
    }
    public function tambah_keranjang()
    {
        $keran = new KeranjangModel();
        $pro = new ProdukModel();
        $data = $keran->viewAll();
        $nama_prod = $this->request->getPost('name');
        $data_pro = $pro->getProdukByName($nama_prod);
        foreach ($data as $isi) {
            if ($isi['name'] === $data_pro[0]['nama_produk']) {
                $array1 = [
                    'rowid'      => $isi['rowid'],
                    'qty' => $isi['qty'] + 1
                ];
                $keran->update_keranjang($array1);
                session()->setFlashdata('notif', 'Produk <strong>' . $nama_prod . '</strong> berhasil dimasukkan ke keranjang');
                return redirect('produk');
            }
        }
        $array = [
            'id' => $this->request->getPost('id'),
            'qty' => 1,
            'price' => $this->request->getPost('price'),
            'name' => $nama_prod,
            'options' => array(
                'modal' => $this->request->getPost('modal'),
                'stok' => $this->request->getPost('stok'),
                'gambar' => $this->request->getPost('gambar'),
            )
        ];
        $keran->insert_keranjang($array);
        session()->setFlashdata('notif', 'Produk <strong>' . $nama_prod . '</strong> berhasil dimasukkan ke keranjang');
        return redirect('produk');
    }
    public function update_keranjang()
    {
        $keran = new KeranjangModel();
        $cart = $keran->viewAll();
        $i = 0;
        foreach ($cart as $value) :
            $array = [
                'rowid'      => $value['rowid'],
                'qty'     => $this->request->getPost('qty' . $i++),
            ];
            $keran->update_keranjang($array);
        endforeach;
        session()->setFlashdata('notif', 'Berhasil mengubah produk dalam keranjang');
        return redirect('keranjang');
    }
    public function update_keranjang1()
    {
        $keran = new KeranjangModel();
        $cart = $keran->viewAll();
        $i = 0;
        foreach ($cart as $value) :
            $array = [
                'rowid'      => $value['rowid'],
                'qty'     => $this->request->getPost('qty' . $i++),
            ];
            $keran->update_keranjang($array);
        endforeach;
        session()->setFlashdata('notif', 'Berhasil mengubah produk dalam keranjang');
        return redirect('buat_pesanan');
    }
    public function hapus_keranjang($id)
    {
        $keran = new KeranjangModel();
        $keran->delete_keranjang($id);
        session()->setFlashdata('notif', 'Berhasil menghapus salah satu produk dalam keranjang');
        return redirect('keranjang');
    }
    public function hapus_isi_keranjang()
    {
        $keran = new KeranjangModel();
        $keran->delete_semua_keranjang();
        session()->setFlashdata('notif', 'Berhasil menghapus semua produk dalam keranjang');
        return redirect('keranjang');
    }
}
