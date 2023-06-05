<?php

namespace App\Models;

use CodeIgniter\Model;

class KontakModel extends Model
{
    public function __construct(){
        $this->no_hp_owner;
        $this->kode_no_hp;
    }
    private $kode_no_hp = '62';
    private $no_hp_owner = '6281359316368';
    public function pertanyaan_WA($nama,$pesan){
        
        $formatted_message = urlencode(
            "Hai, Wijaya Bakery.\nSaya ".$nama.".\n".$pesan." "
        );
        $url = "https://wa.me/".$this->no_hp_owner."?text=$formatted_message";
        return $url;
        
    }
    public function pesanan_diproses_WA($no_hp,$nama){
        $formatted_message = urlencode(
            "Hai, ".$nama.". Kami dari Wijaya Bakery. Pesanan anda sedang diproses."
        );
        $url = "https://wa.me/".$this->kode_no_hp.$no_hp."?text=$formatted_message";
        return $url;
        
    }
    public function pesanan_selesai_WA($no_hp,$nama){
        $formatted_message = urlencode(
            "Hai, ".$nama.". Kami dari Wijaya Bakery. Pesanan anda sudah selesai."
        );
        $url = "https://wa.me/".$this->kode_no_hp.$no_hp."?text=$formatted_message";
        return $url;
        
    }
    
}