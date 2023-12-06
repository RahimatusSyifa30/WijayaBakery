<?php

namespace App\Controllers;

use App\Models\DetailPesananModel;
use App\Models\KeranjangModel;
use App\Models\KontakModel;
use App\Models\LaporanModel;
use App\Models\PesananModel;
use App\Models\ProdukModel;
use App\Models\UserModel;

class AdminPesananController extends BaseController
{
    public function index()
    {
        helper('form');
        $keran = new KeranjangModel();
        $pes = new PesananModel();
        $detail_pes = new DetailPesananModel();
        $data = [
            'pesanan_belum' => $pes->view_belum(),
            'pesanan_diproses' => $pes->view_diproses(),
            'jumlah_item' => $keran->getTotalBarang(),
        ];

        $counter = 0;
        foreach ($data['pesanan_belum'] as $tes) {
            $data['join_pro'][$counter] = $detail_pes->getJoinProdukById($tes['id_pesanan']);
            $counter++;
        }
        $y = 0;
        foreach ($data['pesanan_diproses'] as $tes) {
            $data['join_pro1'][$y] = $detail_pes->getJoinProdukById($tes['id_pesanan']);
            $y++;
        }
        if (session()->get('isLoggedInAdmin')) {
            return view('admin/admin_pesanan', $data);
        } else {
            session()->setFlashdata('error', "Login admin terlebih dahulu");
            return redirect('admin/login');
        }
    }

    public function insert_pesanan()
    {
        date_default_timezone_set('Asia/Jakarta');
        $t = time();
        $produk = new ProdukModel();
        $user = new UserModel();
        $pes = new PesananModel();
        $detail_pes = new DetailPesananModel();
        $keran = new KeranjangModel();
        $isi_ker = $keran->viewAll();
        $kontak = new KontakModel();
        $data = [
            'jumlah_item' => $keran->getTotalBarang()
        ];
        $array1 = [
            'id_user' => session()->get('UserID'),
            'tanggal' => date('Y-m-d H:i:sa', $t),
            'tanggal_pengambilan' => date('Y-m-d H:i:sa', $t),
            'total_harga' => $keran->totalHarga(),
        ];
        $pes->insert_pesanan($array1);

        foreach ($isi_ker as $detail) {
            $data = $produk->getProdukByName($detail['name']);
            $id = $data[0]['id_produk'];
            $id_pes = $pes->getInsertID();
            $array = [
                'id_user' => session()->get('UserID'),
                'id_pesanan' => $id_pes,
                'id_produk' => $id,
                'kuantitas' => $detail['qty'],
                'sub_modal' => $detail['qty'] * $detail['options']['modal'],
                'sub_total' => $detail['subtotal'],
            ];

            $detail_pes->insert_detail_pesanan($array);
            $stok_baru = $data[0]['stok_produk'] - $detail['qty'];
            $array_stok = [
                'stok_produk' => $stok_baru
            ];
            $produk->update_Produk($id, $array_stok);
        }

        $to_modal = $detail_pes->getTotalModal($id_pes);
        $array_modal = [

            'total_modal' => $to_modal[0]->totalmodal,
        ];
        $produk->updateStok_jikakurangdarinol();
        $pes->update_pesanan($id_pes, $array_modal);

        $data_notif = $pes->getPesananById($pes->getInsertID());
        $userid = session()->get('UserID');
        $admin = $user->getUserByID(1);
        $no_admin = $admin['no_hp_user'];
        $tes = $user->getUserNameByID($userid);
        $nama_pel = $tes['nama_user'];
        $tanggal = $data_notif['tanggal'];
        $url = $kontak->notif_dari_customer_WA($userid, $nama_pel, $tanggal, $no_admin);

        $keran->delete_semua_keranjang();
        session()->setFlashdata('notif', 'Hai, <strong>' . $nama_pel . '</strong>!!! Pesanan berhasil dibuat. Silahkan tunggu beberapa sesaat untuk dikonfirmasi oleh kami.');
        return redirect('admin')->to($url);
        // }
    }
    public function view_buat_pesanan()
    {

        helper('form');
        $keran = new KeranjangModel();
        $data = [

            'isi_ker' => $keran->viewAll(),
            'jumlah_item' => $keran->getTotalBarang(),
            'total_harga' => $keran->totalHarga()

        ];
        echo view('buat_pesanan', $data);
    }
    public function tambahkan_pesanan()
    {
        date_default_timezone_set('Asia/Jakarta');
        $t = time();
        $produk = new ProdukModel();
        $user = new UserModel();
        $pes = new PesananModel();
        $detail_pes = new DetailPesananModel();
        $keran = new KeranjangModel();
        $isi_ker = $keran->viewAll();
        $kontak = new KontakModel();
        $data = [
            'jumlah_item' => $keran->getTotalBarang()
        ];
        $deadline = $this->request->getPost('deadline');
        if ($deadline >= date('Y-m-d', $t)) {
            $array1 = [
                'id_user' => session()->get('UserID'),
                'tanggal' => date('Y-m-d H:i:sa', $t),
                'tanggal_pengambilan' => $deadline,
                'total_harga' => $keran->totalHarga(),
            ];
            $pes->insert_pesanan($array1);
        } else {
            session()->setFlashdata('error', 'Tanggal harus lebih dari hari ini');
            return redirect('buat_pesanan');
        }
        foreach ($isi_ker as $detail) {
            $data = $produk->getProdukByName($detail['name']);
            $id = $data[0]['id_produk'];
            $id_pes = $pes->getInsertID();
            $array = [
                'id_user' => session()->get('UserID'),
                'id_pesanan' => $id_pes,
                'id_produk' => $id,
                'kuantitas' => $detail['qty'],
                'sub_modal' => $detail['qty'] * $detail['options']['modal'],
                'sub_total' => $detail['subtotal'],
            ];

            $detail_pes->insert_detail_pesanan($array);
        }

        $to_modal = $detail_pes->getTotalModal($id_pes);
        $array_modal = [

            'total_modal' => $to_modal[0]->totalmodal,
        ];
        $produk->updateStok_jikakurangdarinol();
        $pes->update_pesanan($id_pes, $array_modal);

        $data_notif = $pes->getPesananById($pes->getInsertID());
        $userid = session()->get('UserID');
        $admin = $user->getUserByID(1);
        $no_admin = $admin['no_hp_user'];
        $tes = $user->getUserNameByID($userid);
        $nama_pel = $tes['nama_user'];
        $tanggal = $data_notif['tanggal'];
        $url = $kontak->notif_dari_customer_WA($userid, $nama_pel, $tanggal, $no_admin);

        $keran->delete_semua_keranjang();
        session()->setFlashdata('notif', 'Hai, <strong>' . $nama_pel . '</strong>!!! Pesanan berhasil dibuat. Silahkan tunggu beberapa sesaat untuk dikonfirmasi oleh kami.');
        return redirect('admin')->to($url);
        // }
    }
    public function update_pesanan($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $t = time();
        helper('form');
        $produk = new ProdukModel();
        $pes = new PesananModel();
        $detail_pes = new DetailPesananModel();
        $keran = new KeranjangModel();

        $data = [
            'pesanan' => $pes->getPesananById($id),
            'produk' => $produk->viewAll(),
            'jumlah_item' => $keran->getTotalBarang(),
            'id_pesan' => $id,
        ];
        $id_pesan = $data['pesanan']['id_pesanan'];
        $data['join_pro'] = $detail_pes->getJoinProdukById($id_pesan);
        return view('admin/admin_edit_pesanan', $data);
    }
    public function delete_pesanan($id)
    {
        $pes = new PesananModel();
        $detail_pes = new DetailPesananModel();
        $data = $pes->getPesananById($id);
        $nama = $data['nama_user'];
        $detail_pes->delete_detail_pesananByIdPesanan($id);
        $pes->delete_pesanan($id);
        session()->setFlashdata('notif', 'Pesanan atas nama <strong>' . $nama . '</strong> berhasil dihapus');
        return redirect('admin');
    }
    public function delete_banyak_pesanan()
    {
        $pes = new PesananModel();
        $detail_pes = new DetailPesananModel();
        $ids = $this->request->getPost('id_pesanan');
        if (!empty($ids)) {
            foreach ($ids as $id) :
                $detail_pes->delete_detail_pesananByIdPesanan($id);
                $pes->delete_pesanan($id);
            endforeach;
            return redirect('admin');
        } else {
            session()->setFlashdata('error', 'Pilih pesanan yang ingin dihapus');
            return redirect('admin');
        }
    }
    public function pesanan_diproses($id)
    {
        $kontak = new KontakModel();
        $pesan = new PesananModel();
        $user = new UserModel();
        $data = $pesan->getPesananById($id);
        $userid = $data['id_user'];
        $tanggal = $data['tanggal'];

        $tes = $user->getUserByID($userid);
        $nama_pel = $tes['nama_user'];
        $no_pel = $tes['no_hp_user'];
        $pesan->pesanan_diproses($id);

        $url = $kontak->pesanan_diproses_WA($userid, $no_pel, $nama_pel, $tanggal);
        session()->setFlashdata('notif', 'Hai, <strong>' . $nama_pel . '</strong>!!! Pesanan sedang diproses.');
        return redirect('admin')->to($url);
    }
    public function pesanan_selesai($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $d = time();
        $kontak = new KontakModel();
        $laporan = new LaporanModel();
        $pesan = new PesananModel();
        $user = new UserModel();

        $data = $pesan->getPesananById($id);
        $nama_pel = $data['nama_user'];
        $no_pel = $data['no_hp_user'];
        $tanggal = $data['tanggal'];
        $modal = $data['total_modal'];
        $untung_kotor = $data['total_harga'];
        $untung_bersih = $data['total_harga'] - $data['total_modal'];
        $pesan->pesanan_selesai($id);
        $array = [
            'id_pesanan' => $id,
            'tanggal_laporan' => date('Y-m-d H:i:sa', $d),
            'modal' => $modal,
            'keuntungan_kotor' => $untung_kotor,
            'keuntungan_bersih' => $untung_bersih,
        ];
        $laporan->insert_laporan($array);
        $userid = $data['id_user'];
        $tanggal = $data['tanggal'];

        $tes = $user->getUserByID($userid);
        $nama_pel = $tes['nama_user'];
        $no_pel = $tes['no_hp_user'];
        $pesan->pesanan_diproses($id);
        $url = $kontak->pesanan_selesai_WA($userid, $no_pel, $nama_pel, $tanggal);
        session()->setFlashdata('notif', 'Hai, <strong>' . $nama_pel . '</strong>!!! Pesanan sudah selesai. Selamat Menikmati');
        return redirect('admin')->to($url);
    }
}
