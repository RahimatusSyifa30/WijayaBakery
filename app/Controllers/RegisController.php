<?php

namespace App\Controllers;

use App\Models\KeranjangModel;
use App\Models\UserModel;

class RegisController extends BaseController
{
    public function index()
    {
        $keran = new KeranjangModel();
        $data['jumlah_item'] = $keran->getTotalBarang();
        if (session()->get('isLoggedIn')) {
            session()->setFlashdata('error', 'Anda sudah login');
            return redirect()->back();
        } else if (session()->get('isLoggedInAdmin')) {
            session()->setFlashdata('error', 'Anda sudah login');
            return redirect('admin');
        } else {
            return view('registrasi', $data);
        }
    }
    public function tambah_user()
    {
        $input = $this->request->getPost('captcha-input');
        $result = $this->request->getPost('captcha-result');
        if ($input == $result) {
            $user = new UserModel();
            $dataBerkas = $this->request->getFile('ktp');
            $fileName = $dataBerkas->getRandomName();
            // $rootPath = ROOTPATH;
            // $filePath = $rootPath . 'app\KTP';
            $dataBerkas->move('image/ktp/', $fileName);
            $no_hp = $this->request->getPost('no_hp');
            $validation =  \Config\Services::validation();
            $validation->setRules([
                'no_hp' => 'required|is_unique[user.no_hp_user]',
            ]);
            $isDataValid = $validation->withRequest($this->request)->run();
            if ($isDataValid) {
                $array = [
                    'nama_user' => $this->request->getPost('nama_user'),
                    'no_hp_user' => $no_hp,
                    'password' => $this->request->getPost('password'),
                    'alamat' => $this->request->getPost('alamat'),
                    'ktp' => $fileName,
                    // 'foto_profil' => 'prof_default.png'
                ];
                $user->insert_User($array);
                session()->setFlashdata('notif', 'Berhasil membuat akun, silahkan <strong>Login</strong>.');
                return redirect('login');
            } else {
                session()->setFlashdata('error', '<strong>No HP</strong> sudah terdaftar.');
                return redirect('registrasi');
            }
        } else {
            session()->setFlashdata('error', 'Jawaban <strong>Captcha</strong> salah.');
            return redirect('registrasi');
        }
    }
}
