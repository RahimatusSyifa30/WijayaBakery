<?php

namespace App\Models;

use CodeIgniter\Model;

class PesananModel extends Model
{
    protected $table      = 'pesanan';
    protected $primaryKey = 'id_pesanan';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_pesanan', 'id_user', 'tanggal', 'tanggal_pengambilan', 'nama_pelanggan', 'no_hp_pelanggan', 'total_modal', 'total_harga'];

    public function view_belum()
    {
        return $this->join('user', 'pesanan.id_user=user.id_user')->where('status', 'Belum')->findAll();
    }
    public function view_diproses()
    {
        return $this->join('user', 'pesanan.id_user=user.id_user')->where('status', 'Diproses')->findAll();
    }
    public function view_selesai()
    {
        return $this->join('user', 'pesanan.id_user=user.id_user')->where('status', 'Selesai')->findAll();
    }
    public function view_all()
    {
        return $this->findAll();
    }
    public function filter_pesanan($start, $end, $nama)
    {
        if ($nama) {
            $db = db_connect();
            $sql = "SELECT * FROM pesanan WHERE nama_pelanggan='" . $nama . "' AND tanggal BETWEEN '" . $start . " 00:00:00' AND '" . $end . " 23:59:59'";
            $data = $db->query($sql);
            $data = $data->getResultArray();
            return $data;
        } else {
            $db = db_connect();
            $sql = "SELECT * FROM pesanan WHERE tanggal BETWEEN '" . $start . " 00:00:00' AND '" . $end . " 23:59:59'";
            $data = $db->query($sql);
            $data = $data->getResultArray();
            return $data;
        }
    }
    public function getPesananById($id)
    {
        return $this->join('user', 'pesanan.id_user=user.id_user')->where('id_pesanan', $id)->first();
    }
    public function getPesananJoinDetail($id, $tanggal)
    {
        $db = db_connect();
        $sql = 'SELECT kuantitas,nama_produk
        FROM detail_pesanan JOIN produk ON produk.id_produk = detail_pesanan.id_produk JOIN pesanan
        ON detail_pesanan.id_pesanan = pesanan.id_pesanan WHERE detail_pesanan.id_user="' . $id . '" && tanggal = "' . $tanggal . '"';
        $data = $db->query($sql);
        $data = $data->getResultArray();
        return $data;
    }
    public function getPesananByName($nama, $tanggal)
    {
        $array = ['nama_pelanggan' => $nama, 'tanggal' => $tanggal];
        return $this->where($array)->first();
    }
    public function insert_pesanan($data)
    {
        $this->insert($data);
    }
    public function pesanan_diproses($id)
    {
        $db = db_connect();
        $db->query('UPDATE pesanan SET status="Diproses" WHERE id_pesanan=' . $id);
    }
    public function pesanan_selesai($id)
    {
        $db = db_connect();
        $db->query('UPDATE pesanan SET status="Selesai",tanggal=current_timestamp WHERE id_pesanan=' . $id);
    }
    public function update_pesanan($id, $data)
    {
        return $this->update($id, $data);
    }
    public function delete_pesanan($id)
    {
        return $this->where('id_pesanan', $id)->delete();
    }

    public function search($cari)
    {
        return $this->table('pesanan')->like('nama_pelanggan', $cari);
    }
}
