<?php

namespace App\Controllers;
use App\Models\LaporanModel;
use App\Models\ProdukModel;
use App\Models\PesananModel;
use App\Models\DetailPesananModel;
use App\Models\KeranjangModel;
use Exception;

class AdminPesananController extends BaseController
{
    public function index(){
        helper('form');
        $keran=new KeranjangModel();
        $pes= new PesananModel();
        $detail_pes = new DetailPesananModel();
        $data['pesanan_belum']=$pes->view_belum();
        $data['pesanan_diproses']=$pes->view_diproses();
        $data['jumlah_item'] = $keran->getTotalBarang();
        
        $counter=0;
        foreach($data['pesanan_belum'] as $tes){
            $data['join_pro'][$counter] = $detail_pes->getJoinProdukById($tes['id_pesanan']);
            $counter++;
        }
        foreach($data['pesanan_diproses'] as $tes){
            $data['join_pro1'][$counter] = $detail_pes->getJoinProdukById($tes['id_pesanan']);
            $counter++;
        }     
        return view('admin/admin_pesanan',$data);
    }

    public function insert_pesanan()
    {
        $produk= new ProdukModel();
        $pes= new PesananModel();
        $detail_pes= new DetailPesananModel();
        $keran = new KeranjangModel();
        $data['jumlah_item'] = $keran->getTotalBarang();
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'nama_pel' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        if($isDataValid){
        $nama_pel = $this->request->getPost('nama_pel');
        $array1=[
            'nama_pelanggan' => $nama_pel,
            'no_hp_pelanggan' => $this->request->getPost('no_hp'),
            'total_harga' => $keran->totalHarga(),
        ];
        $pes->insert_pesanan($array1);
        
        foreach($keran->viewAll() as $detail){
            $data=$produk->getProdukByName( $detail['name']);
            $id=$data['id_produk'];
            $total=$pes->totalPesanan();
            $array = [
                'id_pesanan' => $total,
                'id_produk' => $id,
                'kuantitas' => $detail['qty'],
                'sub_total' => $detail['subtotal'],
            ];
            
            $detail_pes->insert_detail_pesanan($array);

        }
        $keran->delete_semua_keranjang();
        session()->setFlashdata('notif','Hai, '.$nama_pel.'!!! Pesanan berhasil dibuat. Silahkan menuju ke Wijaya Bakery untuk konfirmasi.');
        return redirect('admin');
        }
    }
    public function insert_detail_pesanan(){
        $keran = new KeranjangModel();
        $produk = new ProdukModel();
        $pes = new PesananModel();
        $detail_pes = new DetailPesananModel();
        $nama_pel = $this->request->getPost('nama_pel');
            foreach($keran->viewAll() as $detail){
                $data_produk=$produk->getProdukByName( $detail['name']);
                $data_pesan=$pes->getPesananByName( $nama_pel);
                $join = $detail_pes->getJoinPesanan($nama_pel);
                $id=$data_produk['id_produk'];
                $id_pesan=$data_pesan['id_pesanan'];
                foreach($join as $data_join){
                    if($id != $data_join['id_produk']){
                        $array_detail = [
                            'id_pesanan' => $id_pesan,
                            'id_produk' => $id,
                            'kuantitas' => $detail['qty'],
                            'sub_total' => $detail['subtotal'],
                        ];
                        $total = $data_pesan['total_harga']+$keran->totalHarga();
                        $array_pesan = [
                            'total_harga'=>$total
                        ];
                        
                        $detail_pes->insert_detail_pesanan($array_detail);
                        $pes->update_pesanan($id_pesan,$array_pesan);
                        $keran->delete_semua_keranjang();
                        session()->setFlashdata('notif','Data pelanggan atas nama '.$nama_pel.' berhasil diubah');
                        return redirect('admin');
                    }else{
                        session()->setFlashdata('error','Produk yang ditambahkan sudah ada');
                        return redirect('admin/keranjang');
                    }
                }
                
                
            }

        
    }
    public function update_pesanan($id){

        $produk = new ProdukModel();
        $data['produk'] = $produk->viewAll();
        $pes= new PesananModel();
        $detail_pes= new DetailPesananModel();
        $data['pesanan']=$pes->getPesananById($id);
        
        $id_pesan=$data['pesanan']['id_pesanan'];
        $keran = new KeranjangModel();
        $data['jumlah_item'] = $keran->getTotalBarang();
        $data['join_pro'] = $detail_pes->getJoinProdukById($id_pesan);
        $tes = $detail_pes->getJoinProdukById($id_pesan);
        $i=0;
        foreach($tes as $yipi){
            $data['submodal'][$i] = $detail_pes->getSubTotal($yipi['kuantitas'],$yipi['modal_produk']);
            $data['subtotal'][$i] = $detail_pes->getSubTotal($yipi['kuantitas'],$yipi['harga_produk']);
            
            $i++;
        }
        $data['totalmodal']=array_sum($data['submodal']);
        $data['totalharga']=array_sum($data['subtotal']);

        $validation =  \Config\Services::validation();
        $validation->setRules([
            'nama_pel' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        $nama_pel = $this->request->getPost('nama_pel');
        if($isDataValid){
            
            $no_hp = $this->request->getPost('no_hp');
            $array=[
                'nama_pelanggan' => $nama_pel,
                'no_hp_pelanggan' => $no_hp,
            ];
            $pes->update_pesanan($id,$array);

            session()->setFlashdata('notif','Data pelanggan atas nama '.$nama_pel.' berhasil diubah');
            return redirect('admin');
        }
        
        return view('admin/admin_edit_pesanan',$data);
    }
    public function delete_pesanan($id){
        $pes = new PesananModel();
        $detail_pes = new DetailPesananModel();
        $data=$pes->getPesananById($id);
        $nama = $data['nama_pelanggan'];
        $detail_pes->delete_detail_pesanan($id);
        $pes->delete_pesanan($id);
        session()->setFlashdata('notif','Pesanan atas nama '.$nama.' berhasil dihapus');
        return redirect('admin');
    }
    public function pilih_pesanan(){
        
        helper('form');
        $produk = new ProdukModel();
        $keran = new KeranjangModel();
        $data['jumlah_item'] = $keran->getTotalBarang();
        $data['produk']=$produk->findAll();
        echo view('admin/admin_pilih_pesanan',$data);
    }
    public function pesanan_diproses($id){
        $pesan = new PesananModel();
        $data = $pesan->getPesananById($id);
        $nama_pel = $data['nama_pelanggan'];
        $pesan->pesanan_diproses($id);
        session()->setFlashdata('notif','Hai, '.$nama_pel.'!!! Pesanan sedang diproses.');
        return redirect('admin');
    }
    public function pesanan_selesai($id){
        $laporan= new LaporanModel();
        $pesan = new PesananModel();
        $data = $pesan->getPesananById($id);
        $nama_pel = $data['nama_pelanggan'];
        $pesan->pesanan_selesai($id);
        $array=[
            'id_pesanan'=>$id,
            'modal'=>$this->request->getPost('total_modal'.$id),
            'keuntungan_kotor'=>$this->request->getPost('untung_kotor'.$id),
            'keuntungan_bersih'=>$this->request->getPost('untung_bersih'),
        ];
        $laporan->insert_laporan($array);
        session()->setFlashdata('notif','Hai, '.$nama_pel.'!!! Pesanan sudah selesai. Selamat Menikmati');
        return redirect('admin');
    }
    
}