<?php

namespace App\Models;

use CodeIgniter\Model;

class PesananModel extends Model
{
    protected $table      = 'pesanan';
    protected $primaryKey = 'id_pesanan';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_pesanan','tanggal','nama_pelanggan','no_hp_pelanggan','total_harga'];
    
    public function view_belum(){
        return $this->where('status','Belum')->findAll();
    }
    public function view_diproses(){
        return $this->where('status','Diproses')->findAll();
    }
    public function view_selesai(){
        return $this->where('status','Selesai')->findAll();
    }
    public function view_DariBulan(){
        $db=db_connect();
        $db->query('SELECT MONTH(tanggal) FROM pesanan');
        $db->query('SELECT * FROM pesanan WHERE MONTH(tanggal)=');
    }
    public function getPesananById($id){
        return $this->find($id);
    }
    public function insert_pesanan($data){
        $db=db_connect();
        $db->query('alter table pesanan auto_increment=1');
        $db->query('alter table detail_pesanan auto_increment=1');
        $this->insert($data);

    }
    public function pesanan_diproses($id){
        $db=db_connect();
        $db->query('UPDATE pesanan SET status="Diproses" WHERE id_pesanan='.$id);
    }
    public function pesanan_selesai($id){
        $db=db_connect();
        $db->query('UPDATE pesanan SET status="Selesai",tanggal=current_timestamp WHERE id_pesanan='.$id);
    }
    public function update_pesanan($id,$data){
        return $this->update($id,$data);
    }
    public function delete_pesanan($id){
        return $this->delete($id);
    }
    public function totalPesanan(){
        $db=db_connect();
        $data=$db->table('pesanan')->countAll();
        return $data;
    }
    
    
}