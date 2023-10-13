<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KeranjangModel;
use App\Models\UserModel;

class LoginController extends BaseController
{
    public function index()
    {
        $keran = new KeranjangModel();
        $data = [];
        $data['jumlah_item'] = $keran->getTotalBarang();

        $rules = [
            'no_hp' => 'required',
            'password' => 'required'
        ];

        $errors = [
            'password' => [
                'required' => 'Password wajib diisi'
            ],
            'no_hp' => [
                'required' => 'Username wajib diisi'
            ]
        ];

        if (!$this->validate($rules, $errors)) {
            $data['validation'] = $this->validator;
        } else {
            $model = new UserModel();
            $user = $model->getUserByNoHP($this->request->getPost('no_hp'));
            if ($user != null) {
                if ($user['password'] == 'admin111') {
                    session()->set('isLoggedInAdmin', true);
                    session()->set('UserID', $user['id_user']);
                    $string = $user['nama_user'];
                    $words = explode(' ', $string);
                    $firstWord = $words[0];
                    session()->set('nama', $firstWord);
                    // session()->set('no_hp', $user['no_hp_user']);
                    session()->set('foto-prof', $user['foto_profil']);
                    session()->set('verif', $user['verifikasi']);
                    session()->setFlashdata('notif', 'Selamat datang, Admin <strong>' . $firstWord . '</strong>');
                    return redirect('admin');
                } else if ($user['password'] == $this->request->getPost('password')) {
                    session()->set('isLoggedIn', true);
                    session()->set('UserID', $user['id_user']);
                    $string = $user['nama_user'];
                    $words = explode(' ', $string);
                    $firstWord = $words[0];
                    session()->set('nama', $firstWord);
                    // session()->set('no_hp', $user['no_hp_user']);
                    session()->set('foto-prof', $user['foto_profil']);
                    session()->set('verif', $user['verifikasi']);
                    session()->setFlashdata('notif', 'Selamat datang, <strong>' . $firstWord . '</strong>');
                    return redirect('produk');
                } else {
                    session()->setFlashdata('error', "Password salah");
                    return redirect('login');
                }
            } else {
                session()->setFlashdata('error', "Akun tidak terdaftar");
                return redirect('login');
            }
        }

        echo view('login', $data);
    }

    public function logout()
    {
        session()->destroy();
        session()->setFlashdata('notif', 'Log Out Berhasil');
        return redirect('login');
    }
}
