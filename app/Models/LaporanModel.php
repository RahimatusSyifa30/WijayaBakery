<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model
{
    protected $table      = 'laporan';
    protected $primaryKey = 'id_laporan';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_laporan','id_pesanan','tanggal','modal','keuntungan_kotor','keuntungan_bersih'];
    public function viewAll(){
        return $this->findAll();
    }
    public function insert_laporan($data){
        $this->insert($data);
    }
}