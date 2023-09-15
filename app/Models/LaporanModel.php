<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model
{
    protected $table      = 'laporan';
    protected $primaryKey = 'id_laporan';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_laporan', 'id_pesanan', 'tanggal_laporan', 'modal', 'keuntungan_kotor', 'keuntungan_bersih'];
    public function viewAll()
    {
        $db = db_connect();
        $sql = "SELECT * FROM laporan JOIN pesanan ON laporan.id_pesanan=pesanan.id_pesanan";
        $result = $db->query($sql);
        return $result->getResultArray();
    }
    public function insert_laporan($data)
    {
        $this->insert($data);
    }

    public function filter_laporan($start, $end, $nama)
    {
        if ($nama) {
            $db = db_connect();
            $sql = "SELECT * FROM laporan JOIN pesanan ON laporan.id_pesanan=pesanan.id_pesanan WHERE nama_pelanggan='" . $nama . "' AND tanggal_laporan BETWEEN '" . $start . " 00:00:00' AND '" . $end . " 23:59:59'";
            $data = $db->query($sql);
            $data = $data->getResultArray();
            return $data;
        } else {
            $db = db_connect();
            $sql = "SELECT * FROM laporan JOIN pesanan ON laporan.id_pesanan=pesanan.id_pesanan WHERE tanggal_laporan BETWEEN '" . $start . " 00:00:00' AND '" . $end . " 23:59:59'";
            $data = $db->query($sql);
            $data = $data->getResultArray();
            return $data;
        }
    }
    public function sum_modal_laporan_filter($start, $end, $nama)
    {
        if ($nama) {
            $db = db_connect();
            $sql = "SELECT sum(modal) as modal FROM laporan JOIN pesanan ON laporan.id_pesanan=pesanan.id_pesanan WHERE nama_pelanggan='" . $nama . "' AND tanggal_laporan BETWEEN '" . $start . " 00:00:00' AND '" . $end . " 23:59:59'";
            $data = $db->query($sql);
            $data = $data->getResult();
            return $data;
        } else {
            $db = db_connect();
            $sql = "SELECT sum(modal) as modal FROM laporan WHERE tanggal_laporan BETWEEN '" . $start . " 00:00:00' AND '" . $end . " 23:59:59'";
            $data = $db->query($sql);
            $data = $data->getResult();
            return $data;
        }
    }
    public function sum_untung_kotor_laporan_filter($start, $end, $nama)
    {
        if ($nama) {
            $db = db_connect();
            $sql = "SELECT sum(keuntungan_kotor) as unkot FROM laporan JOIN pesanan ON laporan.id_pesanan=pesanan.id_pesanan WHERE nama_pelanggan='" . $nama . "' AND tanggal_laporan BETWEEN '" . $start . " 00:00:00' AND '" . $end . " 23:59:59'";
            $data = $db->query($sql);
            $data = $data->getResult();
            return $data;
        } else {
            $db = db_connect();
            $sql = "SELECT sum(keuntungan_kotor) as unkot FROM laporan WHERE tanggal_laporan BETWEEN '" . $start . " 00:00:00' AND '" . $end . " 23:59:59'";
            $data = $db->query($sql);
            $data = $data->getResult();
            return $data;
        }
    }
    public function sum_untung_bersih_laporan_filter($start, $end, $nama)
    {
        if ($nama) {
            $db = db_connect();
            $sql = "SELECT sum(keuntungan_bersih) as unbers FROM laporan JOIN pesanan ON laporan.id_pesanan=pesanan.id_pesanan WHERE nama_pelanggan='" . $nama . "' AND tanggal_laporan BETWEEN '" . $start . " 00:00:00' AND '" . $end . " 23:59:59'";
            $data = $db->query($sql);
            $data = $data->getResult();
            return $data;
        } else {
            $db = db_connect();
            $sql = "SELECT sum(keuntungan_bersih) as unbers FROM laporan WHERE tanggal_laporan BETWEEN '" . $start . " 00:00:00' AND '" . $end . " 23:59:59'";
            $data = $db->query($sql);
            $data = $data->getResult();
            return $data;
        }
    }
    public function sum_modal_laporan_all()
    {
        $db = db_connect();
        $sql = "SELECT sum(modal) as modal FROM laporan";
        $data = $db->query($sql);
        $data = $data->getResult();
        return $data;
    }
    public function sum_untung_kotor_laporan_all()
    {
        $db = db_connect();
        $sql = "SELECT sum(keuntungan_kotor) as unkot FROM laporan";
        $data = $db->query($sql);
        $data = $data->getResult();
        return $data;
    }
    public function sum_untung_bersih_laporan_all()
    {
        $db = db_connect();
        $sql = "SELECT sum(keuntungan_bersih) as unbers FROM laporan";
        $data = $db->query($sql);
        $data = $data->getResult();
        return $data;
    }
    public function search($cari)
    {
        return $this->table('laporan')->like('nama_pelanggan', $cari);
    }
}
