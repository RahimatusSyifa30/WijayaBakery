<?php

namespace App\Controllers;

use App\Models\KeranjangModel;
use App\Models\LaporanModel;

class AdminLaporanController extends BaseController
{
    public function index()
    {
        helper('form');
        $keran = new KeranjangModel();
        $lapor = new LaporanModel();
        $cari = $this->request->getPost('cari');
        if ($cari) {
            $model = $lapor->search($cari);
        } else {
            $model = $lapor;
        }
        $modal = $lapor->sum_modal_laporan_all();
        $untung_kotor = $lapor->sum_untung_kotor_laporan_all();
        $untung_ber = $lapor->sum_untung_bersih_laporan_all();
        $data = [
            'jumlah_item' => $keran->getTotalBarang(),
            'laporan' => $model->join('pesanan', 'laporan.id_pesanan=pesanan.id_pesanan')
                ->select('*')
                ->paginate(10, 'laporan'),
            'pager' => $lapor->pager,
            'modal' => "Rp " . $modal[0]->modal,
            'untung_kotor' => "Rp " . $untung_kotor[0]->unkot,
            'unber' => "Rp " . $untung_ber[0]->unbers
        ];
        if (session()->get('isLoggedIn')) {
            return view('admin/admin_laporan', $data);
        } else {
            session()->setFlashdata('error', "Login admin terlebih dahulu");
            return redirect('admin/login');
        }
    }
    public function filter_laporan()
    {
        setlocale(LC_TIME, 'IND');
        helper('form');
        $keran = new KeranjangModel();
        $lapor = new LaporanModel();
        $data['jumlah_item'] = $keran->getTotalBarang();
        $start = $this->request->getGet('start');
        $end = $this->request->getGet('end');

        if ($start > $end) {
            session()->setFlashdata('error', "Tanggal awal tidak boleh melebihi tanggal akhir");
            return redirect()->back();
        } else if ($start != null && $end != null) {
            $cari = $this->request->getPost('cari');
            if ($cari) {
                $model = $lapor->search($cari);
            } else {
                $model = $lapor;
            }
            $tes = "tanggal_laporan BETWEEN '" . $start . " 00:00:00' AND '" . $end . " 23:59:59'";
            $data['laporan'] = $lapor->filter_laporan($start, $end, $cari);
            $model->join('pesanan', 'laporan.id_pesanan=pesanan.id_pesanan')->select('*')->where($tes)->paginate(10, 'laporan');
            $awal = strftime('%d %B %Y', strtotime($start));
            $akhir = strftime('%d %B %Y', strtotime($end));
            $data['pager'] = $lapor->pager;
            $modal = $model->sum_modal_laporan_filter($start, $end, $cari);
            $data['modal'] = "Rp " . $modal[0]->modal;
            $untung_kotor = $model->sum_untung_kotor_laporan_filter($start, $end, $cari);
            $data['untung_kotor'] = "Rp " . $untung_kotor[0]->unkot;
            $untung_ber = $model->sum_untung_bersih_laporan_filter($start, $end, $cari);
            $data['unber'] = "Rp " . $untung_ber[0]->unbers;
            session()->setFlashdata('notif', "Menampilkan tanggal dari <strong>" . $awal . "</strong> sampai <strong>" . $akhir . "</strong>");
        } else {
            session()->setFlashdata('error', "Tanggal tidak boleh kosong");
            return redirect()->back();
        }
        return view('admin/admin_laporan', $data);
    }
    public function reset_tanggal()
    {
        if (session()->get('isLoggedIn')) {
            session()->setFlashdata('notif', "Berhasil mereset tanggal");
            return redirect('admin/laporan');
        } else {
            session()->setFlashdata('error', "Login admin terlebih dahulu");
            return redirect('admin/login');
        }
    }
}
