<?php

namespace App\Controllers;

use App\Models\DetailPesananModel;
use App\Models\KeranjangModel;
use App\Models\PesananModel;

class AdminRiwayatController extends BaseController
{
    public function index()
    {
        helper('form');
        $keran = new KeranjangModel();
        $pes = new PesananModel();
        $detail_pes = new DetailPesananModel();

        $cari = $this->request->getPost('cari');
        if ($cari) {
            $model = $pes->search($cari);
        } else {
            $model = $pes;
        }
        $data = [
            'jumlah_item' => $keran->getTotalBarang(),
            'pesanan_selesai' => $model->join('user', 'user.id_user=pesanan.id_user')->where('status', 'Selesai')->orderBy('tanggal', 'DESC')->paginate(10, 'pesanan'),
            'pager' => $pes->pager,
        ];
        $counter = 0;
        foreach ($data['pesanan_selesai'] as $tes) {
            $data['join_pro'][$counter] = $detail_pes->getJoinProdukById($tes['id_pesanan']);
            $counter++;
        }
        if (session()->get('isLoggedInAdmin')) {
            return view('admin/admin_riwayat_trs', $data);
        } else {
            session()->setFlashdata('error', "Login admin terlebih dahulu");
            return redirect('admin/login');
        }
    }
    public function filter_riwayat()
    {
        setlocale(LC_TIME, 'IND');
        helper('form');
        $keran = new KeranjangModel();
        $pes = new PesananModel();
        $detail_pes = new DetailPesananModel();
        // $data['jumlah_item'] = $keran->getTotalBarang();
        $start = $this->request->getGet('start');
        $end = $this->request->getGet('end');
        if ($start > $end) {
            session()->setFlashdata('error', "Tanggal awal tidak boleh melebihi tanggal akhir");
            return redirect()->back();
        } else if ($start != null && $end != null) {
            $cari = $this->request->getPost('cari');
            if ($cari) {
                $model = $pes->search($cari);
            } else {
                $model = $pes;
            }
            $tes = "tanggal BETWEEN '" . $start . " 00:00:00' AND '" . $end . " 23:59:59' ORDER BY tanggal DESC";
            $model->select('*')->where($tes)->paginate(10, 'pesanan');
            $data = [
                'jumlah_item' => $keran->getTotalBarang(),
                'pager' => $model->pager,
                'pesanan_selesai' => $pes->filter_pesanan($start, $end, $cari),
            ];
            $counter = 0;
            foreach ($data['pesanan_selesai'] as $tes) {
                $data['join_pro'][$counter] = $detail_pes->getJoinProdukById($tes['id_pesanan']);
                $counter++;
            }
            $awal = strftime('%d %B %Y', strtotime($start));
            $akhir = strftime('%d %B %Y', strtotime($end));
            session()->setFlashdata('notif', "Menampilkan tanggal dari <strong>" . $awal . "</strong> sampai <strong>" . $akhir . "</strong>");
        } else {
            session()->setFlashdata('error', "Tanggal tidak boleh kosong");
            return redirect()->back();
        }
        echo view('admin/admin_riwayat_trs', $data);
    }
    public function reset_tanggal()
    {
        if (session()->get('isLoggedInAdmin')) {
            session()->setFlashdata('notif', "Berhasil mereset tanggal");
            return redirect('admin/riwayat');
        } else {
            session()->setFlashdata('error', "Login admin terlebih dahulu");
            return redirect('admin/login');
        }
    }
}
