<?php

namespace App\Models;

use CodeIgniter\Model;

class KontakUsModel extends Model
{
    public function __construct(){
        $this->no_hp_owner;
    }
    private $no_hp_owner = '6281359316368';
    public function pertanyaan_WA($nama,$pesan){
        
        $formatted_message = urlencode(
            "Hai, Wijaya Bakery.\nSaya ".$nama.".\n".$pesan." "
        );
        $url = "https://wa.me/".$this->no_hp_owner."?text=$formatted_message";
        return $url;
        
    }
    public function pesanan_diproses_WA($nama){
        $formatted_message = urlencode(
            "Hai, ".$nama.". Kami dari Wijaya Bakery. Pesanan anda sedang diproses"
        );
        $url = "https://wa.me/".$this->no_hp_owner."?text=$formatted_message";
        return $url;
        
    }
    public function pesanan_selesai_WA($nama){
        $formatted_message = urlencode(
            "Hai, ".$nama.". Kami dari Wijaya Bakery. Pesanan anda sudah selesai"
        );
        $url = "https://wa.me/".$this->no_hp_owner."?text=$formatted_message";
        return $url;
        
    }
    protected $table      = 'kontak_us';
    protected $primaryKey = 'id_kontak_us';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_kontak_us','tanggal','nama_costumer','no_telp_customer','subjek_customer','pesan_customer'];
    
    public function view_belum_dibaca(){
        return $this->where('status','Belum Dibaca')->findAll();
    }
    public function view_selesai_dibaca(){
        return $this->where('status','Sudah Dibaca')->findAll();
    }
    public function filter_kontak_us($start,$end){
        $db = db_connect();
        $sql = "SELECT * FROM kotak_us WHERE tanggal BETWEEN '".$start." 00:00:00' AND '".$end." 23:59:59'";
        $data=$db->query($sql);
        $data=$data->getResultArray();
        
        return $data;
    }
    public function getKontakUsById($id){
        return $this->find($id);
    }
    public function getKontakUsByName($nama){
        return $this->where('nama_customer',$nama)->first();
    }
    public function insert_kontak_us($data){
        $db=db_connect();
        $db->query('alter table kontak_us auto_increment=1');
        $this->insert($data);

    }
    public function kontak_us_selesai($id){
        $db=db_connect();
        $db->query('UPDATE kontak_us SET status="Selesai Dibaca",tanggal=current_timestamp WHERE id_kontak_us='.$id);
    }
    public function update_kontak_us($id,$data){
        return $this->update($id,$data);
    }
    public function delete_kontak_us($id){
        return $this->delete($id);
    }
    public function totalKontakUs(){
        $db=db_connect();
        $data=$db->table('kontak_us')->countAll();
        return $data;
    }
    
    
}