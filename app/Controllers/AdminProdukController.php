<?php

namespace App\Controllers;

use App\Models\KelProdukModel;
use App\Models\KeranjangModel;
use App\Models\ProdukModel;

class AdminProdukController extends BaseController
{
    public function index()
    {
        helper('form');
        helper('url');
        $kel_pro = new KelProdukModel();
        $pro = new ProdukModel();
        $keran = new KeranjangModel();
        $data = [
            'kel_produk' => $kel_pro->viewAll(),
            'produk' => $pro->viewAll(),
            'jumlah_item' => $keran->getTotalBarang(),
        ];
        if (session()->get('isLoggedInAdmin')) {
            return view("admin/admin_produk", $data);
        } else {
            session()->setFlashdata('error', "Login admin terlebih dahulu");
            return redirect('admin/login');
        }
    }
    public function insert_produk()
    {

        $produk = new ProdukModel();
        $kel_pro = new KelProdukModel();
        $data['kel_produk'] = $kel_pro->viewAll();
        $keran = new KeranjangModel();
        $data['jumlah_item'] = $keran->getTotalBarang();
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'nama_pro' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $dataBerkas = $this->request->getFile('gambar_pro');
            $fileName = $dataBerkas->getRandomName();
            $dataBerkas->move('image/roti/', $fileName);
            $nama_pro = $this->request->getPost('nama_pro');
            $data_kel = $kel_pro->getKelProdukByName($this->request->getPost('jenis_pro'));
            $id_kel = $data_kel['id_kel'];
            $array = [
                'nama_produk' => $nama_pro,
                'jenis_produk' => $id_kel,
                'stok_produk' => $this->request->getPost('stok_pro'),
                'modal_produk' => $this->request->getPost('modal_pro'),
                'harga_produk' => $this->request->getPost('harga_pro'),
                'informasi_produk' => $this->request->getPost('info_pro'),
                'gambar_produk' => $fileName
            ];
            $produk->insert_Produk($array);
            session()->setFlashdata('notif', 'Produk <strong>' . $nama_pro . '</strong> Berhasil Ditambah');
            return redirect('admin/produk');
        }
        if (session()->get('isLoggedInAdmin')) {
            echo view('admin/admin_insert_produk', $data);
        } else {
            session()->setFlashdata('error', "Login admin terlebih dahulu");
            return redirect('admin/login');
        }
    }
    public function update_produk($id)
    {
        $produk = new ProdukModel();
        $kel_pro = new KelProdukModel();
        $keran = new KeranjangModel();
        $data = [
            'jumlah_item' => $keran->getTotalBarang(),
            'kel_produk' => $kel_pro->findAll(),
            'produk' => $produk->getProdukById($id),
        ];
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'nama_pro' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        $nama_pro = $this->request->getPost('nama_pro');
        if ($isDataValid) {
            $dataBerkas = $this->request->getFile('gambar_pro');
            $jenis = $this->request->getPost('jenis_pro');
            $data = $produk->getProdukById($id);
            if ($jenis != $data[0]->jenis_produk) {
                if ($dataBerkas != "") {
                    $gam = $this->request->getPost('gambar');
                    unlink('image/roti/' . $gam);
                    $fileName = $dataBerkas->getRandomName();
                    $dataBerkas->move('image/roti/', $fileName);
                    $array = [
                        'nama_produk' => $nama_pro,
                        'jenis_produk' => $this->request->getPost('jenis_pro'),
                        'stok_produk' => $this->request->getPost('stok_pro'),
                        'modal_produk' => $this->request->getPost('modal_pro'),
                        'harga_produk' => $this->request->getPost('harga_pro'),
                        'informasi_produk' => $this->request->getPost('info_pro'),
                        'gambar_produk' => $fileName
                    ];
                    $produk->update_Produk($id, $array);
                    session()->setFlashdata('notif', 'Produk <strong>' . $nama_pro . '</strong> Berhasil Diubah');
                    return redirect('admin/produk');
                } else {
                    $array = [
                        'nama_produk' => $nama_pro,
                        'jenis_produk' => $this->request->getPost('jenis_pro'),
                        'stok_produk' => $this->request->getPost('stok_pro'),
                        'modal_produk' => $this->request->getPost('modal_pro'),
                        'harga_produk' => $this->request->getPost('harga_pro'),
                        'informasi_produk' => $this->request->getPost('info_pro'),
                    ];
                    $produk->update_Produk($id, $array);
                    session()->setFlashdata('notif', 'Produk <strong>' . $nama_pro . '</strong> Berhasil Diubah');
                    return redirect('admin/produk');
                }
            } else {
                if ($dataBerkas != "") {
                    $gam = $this->request->getPost('gambar');
                    unlink('image/roti/' . $gam);
                    $fileName = $dataBerkas->getRandomName();
                    $dataBerkas->move('image/roti/', $fileName);
                    $array = [
                        'nama_produk' => $nama_pro,
                        // 'jenis_produk' => $this->request->getPost('jenis_pro'),
                        'stok_produk' => $this->request->getPost('stok_pro'),
                        'modal_produk' => $this->request->getPost('modal_pro'),
                        'harga_produk' => $this->request->getPost('harga_pro'),
                        'informasi_produk' => $this->request->getPost('info_pro'),
                        'gambar_produk' => $fileName
                    ];
                    $produk->update_Produk($id, $array);
                    session()->setFlashdata('notif', 'Produk <strong>' . $nama_pro . '</strong> Berhasil Diubah');
                    return redirect('admin/produk');
                } else {
                    $array = [
                        'nama_produk' => $nama_pro,
                        // 'jenis_produk' => $this->request->getPost('jenis_pro'),
                        'stok_produk' => $this->request->getPost('stok_pro'),
                        'modal_produk' => $this->request->getPost('modal_pro'),
                        'harga_produk' => $this->request->getPost('harga_pro'),
                        'informasi_produk' => $this->request->getPost('info_pro'),
                    ];
                    $produk->update_Produk($id, $array);
                    session()->setFlashdata('notif', 'Produk <strong>' . $nama_pro . '</strong> Berhasil Diubah');
                    return redirect('admin/produk');
                }
            }
        }
        echo view('admin/admin_edit_produk', $data);
    }
    public function detail_produk($nama)
    {
        helper('form');
        $tes = str_replace("-", " ", $nama);
        $produk = new ProdukModel();
        $jenis_produk = new KelProdukModel();
        $keran = new KeranjangModel();
        $data = [
            'kel_produk' => $jenis_produk->findAll(),
            'pro' => $produk->getProdukByName($tes),
            'jumlah_item' => $keran->getTotalBarang()
        ];
        echo view('admin/admin_detail_produk', $data);
    }
    public function delete_produk($id)
    {
        $produk = new ProdukModel();
        $data = $produk->getProdukById($id);
        $nama = $data['nama_produk'];
        $gam = $data['gambar_produk'];
        unlink('image/roti/' . $gam);
        $produk->delete_Produk($id);
        session()->setFlashdata('notif', 'Produk <strong>' . $nama . '</strong> Berhasil Dihapus');
        return redirect('admin/produk');
    }

    //Kelompok Produk
    public function insert_kel_produk()
    {
        $kel_pro = new KelProdukModel();
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'nama_kel_pro' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $dataBerkas = $this->request->getFile('gambar_kel_pro');
            $fileName = $dataBerkas->getRandomName();
            $dataBerkas->move('image/bg/jenis_produk', $fileName);
            $nama_kel = $this->request->getPost('nama_kel_pro');
            $array = [
                'nama_kel' => $nama_kel,
                'gambar_kel' => $fileName
            ];
            $kel_pro->insert_KelProduk($array);
            session()->setFlashdata('notif', 'Kelompok Produk <strong>' . $nama_kel . '</strong> Berhasil Ditambah');
            return redirect('admin/produk');
        }
        echo view('admin/produk');
    }
    public function update_kel_produk($id)
    {
        $kel_pro = new KelProdukModel();
        $data['kel_produk1'] = $kel_pro->getKelProdukById($id);
        $keran = new KeranjangModel();
        $data['jumlah_item'] = $keran->getTotalBarang();
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'nama_kel_pro' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $gam = $this->request->getPost('gambar');
            $dataBerkas = $this->request->getFile('gambar_kel_pro');
            $nama_kel = $this->request->getPost('nama_kel_pro');
            if ($dataBerkas != "") {
                unlink('image/bg/jenis_produk/' . $gam);
                $fileName = $dataBerkas->getRandomName();
                $dataBerkas->move('image/bg/jenis_produk', $fileName);

                $array = [
                    'nama_kel' => $nama_kel,
                    'gambar_kel' => $fileName
                ];
                $kel_pro->update_KelProduk($id, $array);
            } else {
                $array = [
                    'nama_kel' => $nama_kel,
                ];
                $kel_pro->update_KelProduk($id, $array);
            }
            session()->setFlashdata('notif', 'Kelompok Produk <strong>' . $nama_kel . '</strong> Berhasil Diedit');
            return redirect('admin/produk');
        }
        echo view('admin/admin_edit_kel_produk', $data);
    }
    public function delete_kel_produk($id)
    {
        $kel_pro = new KelProdukModel();
        $data = $kel_pro->getKelProdukById($id);
        $nama = $data['nama_kel'];
        $gam = $data['gambar_kel'];
        unlink('image/bg/jenis_produk/' . $gam);
        $kel_pro->delete_KelProduk($id);
        session()->setFlashdata('notif', 'Kelompok Produk <strong>' . $nama . '</strong> Berhasil Dihapus');
        return redirect('admin/produk');
    }
}
