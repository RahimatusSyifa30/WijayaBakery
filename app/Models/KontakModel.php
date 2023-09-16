<?php

namespace App\Models;

use CodeIgniter\Model;

class KontakModel extends Model
{
    public function __construct()
    {
        $this->no_hp_owner;
        $this->kode_no_hp;
    }
    private $kode_no_hp = '62';
    private $no_hp_owner = '6282236047539';
    public function pertanyaan_WA($nama, $pesan)
    {

        $formatted_message = urlencode(
            "Hai, *Wijaya Bakery*.\nSaya *" . $nama . "*.\nSaya Ingin Bertanya.\n\n" . $pesan . " "
        );
        $url = "https://wa.me/" . $this->no_hp_owner . "?text=$formatted_message";
        return $url;
    }
    public function pesanan_diproses_WA($no_hp, $nama, $tanggal)
    {
        $pes = new PesananModel();
        $data = $pes->getPesananJoinDetail($nama, $tanggal);
        $result = "";
        foreach ($data as $item) {
            $result .=  "*" . $item["kuantitas"] . " " . $item["nama_produk"] . "*\n";
        }
        $formatted_message = urlencode(
            "Hai, *" . $nama . "*. Kami dari *Wijaya Bakery*. Pesanan anda sedang *diproses*. \n\nBerikut Pesanan anda : \n" . $result
        );
        $url = "https://wa.me/" . $this->kode_no_hp . $no_hp . "?text=$formatted_message";
        return $url;
    }
    public function pesanan_selesai_WA($no_hp, $nama, $tanggal)
    {
        $pes = new PesananModel();
        $data = $pes->getPesananJoinDetail($nama, $tanggal);
        $result = "";
        foreach ($data as $item) {
            $result .=  "*" . $item["kuantitas"] . " " . $item["nama_produk"] . "*\n";
        }
        $formatted_message = urlencode(
            "Hai, *" . $nama . "*. Kami dari *Wijaya Bakery*. Pesanan anda sudah *selesai*. \n\nBerikut Pesanan anda : \n" . $result
        );
        $url = "https://wa.me/" . $this->kode_no_hp . $no_hp . "?text=$formatted_message";
        return $url;
    }
    public function notif_dari_customer_WA($nama, $tanggal)
    {
        $pes = new PesananModel();
        $data = $pes->getPesananJoinDetail($nama, $tanggal);
        $result = "";
        foreach ($data as $item) {
            $result .=  "*" . $item["kuantitas"] . " " . $item["nama_produk"] . "*\n";
        }
        $formatted_message = urlencode(
            "Hai, Saya *" . $nama . "*. Saya ingin memesan roti. \n\nBerikut Pesanan saya: \n" . $result
        );
        $url = "https://wa.me/" . $this->no_hp_owner . "?text=$formatted_message";
        return $url;
    }
}
