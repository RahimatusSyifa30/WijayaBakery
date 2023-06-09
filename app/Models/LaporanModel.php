<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model
{
    protected $table      = 'laporan';
    protected $primaryKey = 'id_laporan';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_laporan','id_pesanan','tanggal_laporan','modal','keuntungan_kotor','keuntungan_bersih'];
    public function viewAll(){
        $db = db_connect();
        $sql = "SELECT *FROM laporan JOIN pesanan ON laporan.id_pesanan=pesanan.id_pesanan";
        $result = $db->query($sql);
        return $result->getResultArray();
    }
    public function insert_laporan($data){
        $this->insert($data);
    }
}