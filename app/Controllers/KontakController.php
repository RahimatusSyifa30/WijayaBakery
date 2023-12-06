<?php

namespace App\Controllers;

use App\Models\KontakModel;
use App\Models\UserModel;

use App\Models\KeranjangModel;

class KontakController extends BaseController
{
    public function index()
    {
        $keran = new KeranjangModel();
        $user = new UserModel();
        $admin = $user->getUserByID(1);
        $no_admin = $admin['no_hp_user'];
        $data = [
            'jumlah_item' => $keran->getTotalBarang(),
            'no_hp' => $no_admin,
        ];
        return view('kontakkami', $data);
    }
    public function kirim_pesan()
    {
        $input = $this->request->getPost('captcha-input');
        $result = $this->request->getPost('captcha-result');
        if ($input == $result) {
            $user = new UserModel();
            $kontak = new KontakModel();
            $nama = $this->request->getPost('nama');
            $pesan = $this->request->getPost('pesan');
            $admin = $user->getUserByID(1);
            $no_admin = $admin['no_hp_user'];
            $url = $kontak->pertanyaan_WA($nama, $pesan, $no_admin);
            session()->setFlashdata('notif', 'Berhasil mengirim pesan');
            return redirect()->to($url);
        } else {
            session()->setFlashdata('error', 'Captcha Salah');
            return redirect('kontak_kami');
        }
    }
}
