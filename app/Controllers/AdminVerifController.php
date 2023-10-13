<?php

namespace App\Controllers;

use App\Models\KeranjangModel;
use App\Models\UserModel;

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
        return view('admin/admin_verif', $data);
    }

    public function verifikasi()
    {
    }
}
