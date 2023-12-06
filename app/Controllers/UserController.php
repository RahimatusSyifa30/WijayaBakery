<?php

namespace App\Controllers;

use App\Models\KeranjangModel;
use App\Models\UserModel;
use App\Models\PesananModel;
use App\Models\DetailPesananModel;

class UserController extends BaseController
{
    public function akun_detail()
    {
        helper('form');
        $keran = new KeranjangModel();
        $data['jumlah_item'] = $keran->getTotalBarang();
        $user = new UserModel();
        $data['user'] = $user->getUserByID(session()->get('UserID'));
        return view('akun_detail', $data);
    }
    public function update_akun()
    {
        $keran = new KeranjangModel();
        $data['jumlah_item'] = $keran->getTotalBarang();
        $user = new UserModel();
        $data['user'] = $user->getUserByID(session()->get('UserID'));
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'no_hp' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        $id_user = session()->get('UserID');
        if ($isDataValid) {
            $dataKTP = $this->request->getFile('ktp');
            $foto_prof = $this->request->getFile('foto-pro');
            if ($dataKTP != "") {
                $fileName = $dataKTP->getRandomName();
                $fileNameProf = $foto_prof->getRandomName();
                $dataKTP->move('image/ktp/', $fileName);
                if ($foto_prof != "") {
                    $foto_prof->move('image/prof/', $fileNameProf);
                    $no_hp = $this->request->getPost('no_hp');
                    $array = [
                        'nama_user' => $this->request->getPost('nama_user'),
                        'no_hp_user' => $no_hp,
                        'password' => $this->request->getPost('password'),
                        'alamat' => $this->request->getPost('alamat'),
                        'ktp' => $fileName,
                        'foto_profil' => $fileNameProf
                    ];
                    $user->update_User($id_user, $array);
                    session()->set('ktp', $fileName);
                    session()->set('foto-prof', $fileNameProf);
                } else {
                    $no_hp = $this->request->getPost('no_hp');
                    $array = [
                        'nama_user' => $this->request->getPost('nama_user'),
                        'no_hp_user' => $no_hp,
                        'password' => $this->request->getPost('password'),
                        'alamat' => $this->request->getPost('alamat'),
                        'ktp' => $fileName,
                    ];
                    $user->update_User($id_user, $array);
                    session()->set('ktp', $fileName);
                }
            } else {
                if ($foto_prof != "") {
                    $fileNameProf = $foto_prof->getRandomName();
                    $foto_prof->move('image/prof/', $fileNameProf);
                    $no_hp = $this->request->getPost('no_hp');
                    $array = [
                        'nama_user' => $this->request->getPost('nama_user'),
                        'no_hp_user' => $no_hp,
                        'password' => $this->request->getPost('password'),
                        'alamat' => $this->request->getPost('alamat'),
                        'foto_profil' => $fileNameProf
                    ];
                    $user->update_User($id_user, $array);
                    session()->set('foto-prof', $fileNameProf);
                } else {
                    $no_hp = $this->request->getPost('no_hp');
                    $array = [
                        'nama_user' => $this->request->getPost('nama_user'),
                        'no_hp_user' => $no_hp,
                        'password' => $this->request->getPost('password'),
                        'alamat' => $this->request->getPost('alamat'),
                    ];
                    $user->update_User($id_user, $array);
                }
            }
            $string = $this->request->getPost('nama_user');
            $words = explode(' ', $string);
            $firstWord = $words[0];
            session()->set('nama', $firstWord);
            session()->setFlashdata('notif', 'Berhasil mengubah akun.');
            return redirect('akun_detail');
        } else {
            session()->setFlashdata('error', '<strong>No HP</strong> sudah terdaftar.');
            return redirect('akun_detail');
        }
        echo view('akun_detail', $data);
        // session()->setFlashdata('notif', 'Berhasil mengubah akun');
    }
    public function delete_akun()
    {
        $user = new UserModel();
        $user->delete_User(session()->get('UserID'));
        session()->destroy();
        session()->setFlashdata('notif', 'Berhasil menghapus akun');
        return redirect('registrasi');
    }
    public function pesanan_saya()
    {

        $keran = new KeranjangModel();
        $data['jumlah_item'] = $keran->getTotalBarang();
        $pes = new PesananModel();
        $detail_pes = new DetailPesananModel();
        $data['pes'] = $pes->getAllPesananByIdUser(session()->get('UserID'));
        $counter = 0;
        foreach ($data['pes'] as $tes) {
            $data['join_pro'][$counter] = $detail_pes->getJoinProdukById($tes['id_pesanan']);
            $counter++;
        }
        return view('pesanan_saya', $data);
    }
    public function riwayat()
    {
        $keran = new KeranjangModel();
        $data['jumlah_item'] = $keran->getTotalBarang();
        $pes = new PesananModel();
        $detail_pes = new DetailPesananModel();
        $data['pes'] = $pes->getAllPesananSelesaiByIdUser(session()->get('UserID'));
        $counter = 0;
        foreach ($data['pes'] as $tes) {
            $data['join_pro'][$counter] = $detail_pes->getJoinProdukById($tes['id_pesanan']);
            $counter++;
        }
        return view('riwayat_trs', $data);
    }
}
