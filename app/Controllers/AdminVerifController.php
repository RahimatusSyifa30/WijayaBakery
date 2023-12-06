<?php

namespace App\Controllers;

use App\Models\KeranjangModel;
use App\Models\UserModel;
use App\Models\KontakModel;

class AdminVerifController extends BaseController
{
    public function index()
    {
        $keran = new KeranjangModel();
        $data = [
            'jumlah_item' => $keran->getTotalBarang(),

        ];
        return view('admin/admin_verif_pilih', $data);
    }
    public function view_belum()
    {
        $keran = new KeranjangModel();
        $user = new UserModel();
        $cari = $this->request->getPost('cari');
        if ($cari) {
            $model = $user->search($cari);
        } else {
            $model = $user;
        }
        $data = [
            'jumlah_item' => $keran->getTotalBarang(),
            'user' => $model->select('*')->where('id_user>1')->where('verifikasi="Belum"')->paginate(10, 'user'),
            'pager' => $user->pager,
        ];
        session()->set('title','Belum Verifikasi');
        return view('admin/admin_verif', $data);
    }
    public function view_sudah()
    {
        $keran = new KeranjangModel();
        $user = new UserModel();
        $cari = $this->request->getPost('cari');
        if ($cari) {
            $model = $user->search($cari);
        } else {
            $model = $user;
        }
        $data = [
            'jumlah_item' => $keran->getTotalBarang(),
            'user' => $model->select('*')->where('id_user>1')->where('verifikasi="Diterima"')->paginate(10, 'user'),
            'pager' => $user->pager,
        ];
        session()->set('title','Sudah Verifikasi');

        return view('admin/admin_verif', $data);
    }

    public function verif_diterima($id)
    {
        $user = new UserModel;
        $kontak = new KontakModel;
        $data=$user->getUserByID($id);
        $nama=$data['nama_user'];
        $no_hp=$data['no_hp_user'];
        $user->verif_diterima($id);
        session()->setFlashdata('notif','KTP '.$nama.' sudah terverifikasi');
        $url = $kontak->ktp_diterima($no_hp,$nama);
        return redirect()->to($url);
    }
    public function verif_dihapus($id)
    {
        $user = new UserModel;
        $kontak = new KontakModel;
        $data=$user->getUserByID($id);
        $nama=$data['nama_user'];
        $no_hp=$data['no_hp_user'];
        $user->verif_dihapus($id);
        session()->setFlashdata('notif','KTP '.$nama.' belum terverifikasi');
        $url = $kontak->ktp_dihapus($no_hp,$nama);
        return redirect()->to($url);

    }
}
