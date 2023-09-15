<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailPesananModel extends Model
{
    protected $table      = 'detail_pesanan';
    protected $primaryKey = 'id_detail';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_pesanan', 'id_detail', 'id_produk', 'kuantitas', 'sub_modal', 'sub_total'];
    public function viewAll()
    {
        return $this->findAll();
    }
    public function getDetailByIdPesanan($id)
    {
        return $this->join('produk', 'produk.id_produk=detail_pesanan.id_produk')->where('id_pesanan', $id)->findAll();
    }
    public function getJoinProdukById($id)
    {
        $db = db_connect();
        $sql = 'SELECT id_detail,produk.id_produk,nama_produk,kuantitas,sub_total,sub_modal,modal_produk,harga_produk FROM detail_pesanan JOIN produk ON produk.id_produk = detail_pesanan.id_produk WHERE id_pesanan=' . $id;
        $data = $db->query($sql);
        $data = $data->getResultArray();
        return $data;
    }
    public function getIdProdukByIdDetail($id)
    {
        $db = db_connect();
        $sql = 'SELECT produk.id_produk FROM detail_pesanan JOIN produk ON produk.id_produk = detail_pesanan.id_produk WHERE id_detail=' . $id;
        $data = $db->query($sql);
        $data = $data->getResult();
        return $data;
    }
    public function getPesananDetailByProduk($id_pesan, $id_produk)
    {
        return $this->db->table('detail_pesanan')
            ->where('id_pesanan', $id_pesan)
            ->where('id_produk', $id_produk)
            ->get()
            ->getRowArray();
    }
    public function cekDuplikatBarang($orderId, $itemId)
    {
        $query = $this->db->table('detail_pesanan')
            ->where('id_pesanan', $orderId)
            ->where('id_produk', $itemId)
            ->countAllResults();

        return $query > 0;
    }

    public function insert_detail_pesanan($data)
    {
        $this->insert($data);
    }
    public function update_detail_pesanan($id, $data)
    {
        $this->update($id, $data);
    }

    public function update_qty_pesanan($id, $qty)
    {
        $db = db_connect();
        $sql = 'UPDATE detail_pesanan SET kuantitas=' . $qty . ' WHERE id_detail=' . $id;
        $data = $db->query($sql);
        return $data;
    }

    public function delete_detail_pesananByIdDetail($id)
    {
        $this->delete($id);
    }
    public function delete_detail_pesananByIdPesanan($id)
    {
        $this->where('id_pesanan', $id)->delete();
    }
    public function getSubModalByIdDetail($id)
    {
        $db = db_connect();
        $sql = "SELECT sub_modal FROM detail_pesanan WHERE id_detail=" . $id;
        $data = $db->query($sql);
        return $data->getResult();
    }
    public function getSubTotalByIdDetail($id)
    {
        $db = db_connect();
        $sql = "SELECT sub_total FROM detail_pesanan WHERE id_detail=" . $id;
        $data = $db->query($sql);
        return $data->getResult();
    }
    public function getTotalModal($id_pesanan)
    {
        $db = db_connect();
        $sql = 'SELECT SUM(sub_modal) as totalmodal FROM detail_pesanan WHERE id_pesanan= ' . $id_pesanan;
        $data = $db->query($sql);
        return $data->getResult();
    }
    public function getTotalHarga($id_pesanan)
    {
        $db = db_connect();
        $sql = 'SELECT SUM(sub_total) as totalharga FROM detail_pesanan WHERE id_pesanan= ' . $id_pesanan;
        $data = $db->query($sql);
        return $data->getResult();;
    }
}
