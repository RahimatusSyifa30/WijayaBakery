<?php

namespace App\Models;

use CodeIgniter\Model;

class PesananModel extends Model
{
    protected $table      = 'pesanan';
    protected $primaryKey = 'id_pesanan';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_pesanan', 'id_user', 'tanggal', 'tanggal_pengambilan', 'nama_user', 'no_hp_user', 'total_modal', 'total_harga'];

    public function view_belum()
    {
        return $this->join('user', 'pesanan.id_user=user.id_user')->where('status', 'Belum')->orderBy('tanggal', 'DESC')->findAll();
    }
    public function view_diproses()
    {
        return $this->join('user', 'pesanan.id_user=user.id_user')->where('status', 'Diproses')->orderBy('tanggal', 'DESC')->findAll();
    }
    public function view_selesai()
    {
        return $this->join('user', 'pesanan.id_user=user.id_user')->where('status', 'Selesai')->orderBy('tanggal', 'DESC')->findAll();
    }
    public function view_all()
    {
        return $this->findAll();
    }
    public function filter_pesanan($start, $end, $nama)
    {
        if ($nama) {
            $db = db_connect();
            $sql = "SELECT * FROM pesanan WHERE nama_user='" . $nama . "' AND tanggal BETWEEN '" . $start . " 00:00:00' AND '" . $end . " 23:59:59'";
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
    public function getAllPesananByIdUser($id)
    {
        $tes = 'status!="Selesai" AND id_user=' . $id;
        return $this->where($tes)->orderBy('tanggal', 'DESC')->findAll();
    }
    public function getAllPesananSelesaiByIdUser($id)
    {
        return $this->where('id_user', $id)->where('status="Selesai"')->orderBy('tanggal', 'DESC')->findAll();
    }
    public function getPesananJoinDetail($id, $tanggal)
    {
        $db = db_connect();
        $sql = 'SELECT kuantitas,nama_produk
        FROM detail_pesanan JOIN produk ON produk.id_produk = detail_pesanan.id_produk JOIN pesanan
        ON detail_pesanan.id_pesanan = pesanan.id_pesanan WHERE detail_pesanan.id_user=' . $id . ' && tanggal = "' . $tanggal . '"';
        $data = $db->query($sql);
        $data = $data->getResultArray();
        return $data;
    }
    public function getPesananByName($nama, $tanggal)
    {
        $array = ['nama_user' => $nama, 'tanggal' => $tanggal];
        return $this->join('user', 'pesanan.id_user=user.id_user')->where($array)->first();
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
        return $this->table('pesanan')->like('nama_user', $cari);
    }
}
