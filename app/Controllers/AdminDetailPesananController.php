<?php

namespace App\Controllers;

use App\Models\AdminKeranjangModel;
use App\Models\DetailPesananModel;
use App\Models\PesananModel;
use App\Models\ProdukModel;

class AdminDetailPesananController extends BaseController
{
    public function insert_detail_pesanan()
    {
        $keran = new AdminKeranjangModel();
        $produk = new ProdukModel();
        $pes = new PesananModel();
        $detail_pes = new DetailPesananModel();

        $data = $keran->viewAll();
        $array = $this->request->getPost('data');
        list($nama_pel, $tanggal) = explode('|', $array);
        $data_pesan = $pes->getPesananByName($nama_pel, $tanggal);
        $id_pesan = $data_pesan['id_pesanan'];
        foreach ($data as $tes) {
            $id = $produk->getIDProdukByName($tes['name']);
            $cekDetail = $detail_pes->getPesananDetailByProduk($id_pesan, $id[0]->id_produk);
            if ($cekDetail) {
                $array = [
                    'kuantitas' => $cekDetail['kuantitas'] + $tes['qty'],
                    'sub_modal' => $cekDetail['sub_modal'] + ($tes['qty'] * $tes['options']['modal']),
                    'sub_total' => $cekDetail['sub_total'] + $tes['subtotal']
                ];
                $totmod = $detail_pes->getTotalModal($id_pesan);
                $array_pesan = [
                    'total_modal' => $data_pesan['total_modal'] + $totmod[0]->totalmodal,
                    'total_harga' => $data_pesan['total_harga'] + $keran->totalHarga(),
                ];
                $detail_pes->update_detail_pesanan($cekDetail['id_detail'], $array);
                $pes->update_pesanan($id_pesan, $array_pesan);
            } else {
                $array_detail = [
                    'id_pesanan' => $id_pesan,
                    'id_produk' => $id[0]->id_produk,
                    'kuantitas' => $tes['qty'],
                    'sub_modal' => $tes['options']['modal'] * $tes['qty'],
                    'sub_total' => $tes['subtotal'],
                ];
                $array_pesan = [
                    'total_modal' => $data_pesan['total_modal'] + $keran->totalModal(),
                    'total_harga' => $data_pesan['total_harga'] + $keran->totalHarga()
                ];
                $detail_pes->insert_detail_pesanan($array_detail);
                $pes->update_pesanan($id_pesan, $array_pesan);
            }
        }
        $keran->delete_semua_keranjang();
        session()->setFlashdata('notif', 'Data pelanggan atas nama <strong>' . $nama_pel . '</strong> berhasil diubah');
        return redirect('admin');
    }
    public function delete_detail_pesanan($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $t = time();
        $produk = new ProdukModel();
        $pes = new PesananModel();
        $detail_pes = new DetailPesananModel();
        $id_prod = $detail_pes->getIdProdukByIdDetail($id);
        $data = $produk->getProdukById($id_prod[0]->id_produk);
        $nama = $data[0]->nama_produk;

        $id_pesan = $this->request->getPost('id_pesan');
        $submod = $detail_pes->getSubModalByIdDetail($id);
        $totmod = $detail_pes->getTotalModal($id_pesan);
        $subtot = $detail_pes->getSubTotalByIdDetail($id);
        $tothar = $detail_pes->getTotalHarga($id_pesan);
        $array = [
            'tanggal' => date('Y-m-d H:i:sa', $t),
            'total_modal' => $totmod[0]->totalmodal - $submod[0]->sub_modal,
            'total_harga' => $tothar[0]->totalharga - $subtot[0]->sub_total
        ];
        $pes->update_pesanan($id_pesan, $array);
        $detail_pes->delete_detail_pesananByIdDetail($id);
        session()->setFlashdata('notif', 'Produk <strong>' . $nama . '</strong> berhasil dihapus dari pesanan');
        return redirect()->back();
    }
}
