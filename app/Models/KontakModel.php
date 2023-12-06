<?php

namespace App\Models;

use CodeIgniter\Model;

class KontakModel extends Model
{
    public function pertanyaan_WA($nama, $pesan, $no_admin)
    {
        $formatted_message = urlencode(
            "Hai, *Wijaya Bakery*.\nSaya *" . $nama . "*.\nSaya Ingin Bertanya.\n\n" . $pesan . " "
        );
        $url = "https://wa.me/62" . $no_admin . "?text=$formatted_message";
        return $url;
    }
    public function notif_dari_customer_WA($id, $nama, $tanggal, $no_admin)
    {
        $pes = new PesananModel();
        $data = $pes->getPesananJoinDetail($id, $tanggal);
        $result = "";
        foreach ($data as $item) {
            $result .=  "*" . $item["kuantitas"] . " " . $item["nama_produk"] . "*\n";
        }
        $formatted_message = urlencode(
            "Hai, Saya *" . $nama . "*. Saya ingin memesan roti. \n\nBerikut Pesanan saya: \n" . $result
        );
        $url = "https://wa.me/62" . $no_admin . "?text=$formatted_message";
        return $url;
    }
    public function pesanan_diproses_WA($id, $no_hp, $nama, $tanggal)
    {
        $pes = new PesananModel();
        $data = $pes->getPesananJoinDetail($id, $tanggal);
        $result = "";
        foreach ($data as $item) {
            $result .=  "*" . $item["kuantitas"] . " " . $item["nama_produk"] . "*\n";
        }
        $formatted_message = urlencode(
            "Hai, *" . $nama . "*. Kami dari *Wijaya Bakery*. Pesanan anda sedang *diproses*. \n\nBerikut Pesanan anda : \n" . $result
        );
        $url = "https://wa.me/62"  . $no_hp . "?text=$formatted_message";
        return $url;
    }
    public function pesanan_selesai_WA($id, $no_hp, $nama, $tanggal)
    {
        $pes = new PesananModel();
        $data = $pes->getPesananJoinDetail($id, $tanggal);
        $result = "";
        foreach ($data as $item) {
            $result .=  "*" . $item["kuantitas"] . " " . $item["nama_produk"] . "*\n";
        }
        $formatted_message = urlencode(
            "Hai, *" . $nama . "*. Kami dari *Wijaya Bakery*. Pesanan anda sudah *selesai*. \n\nBerikut Pesanan anda : \n" . $result . "\nSelamat Menikmati"
        );
        $url = "https://wa.me/62"  . $no_hp . "?text=$formatted_message";
        return $url;
    }
    public function ktp_diterima($no_hp, $nama)
    {
        $formatted_message = urlencode(
            "Hai, *" . $nama . "*. Kami dari *Wijaya Bakery*. Foto KTP anda *terverifikasi*. \nSelamat Berbelanja di Wijaya Bakery"
        );
        $url = "https://wa.me/62"  . $no_hp . "?text=$formatted_message";
        return $url;
    }
    public function ktp_dihapus($no_hp, $nama)
    {
        $formatted_message = urlencode(
            "Hai, *" . $nama . "*. Kami dari *Wijaya Bakery*. Mohon Maaf, Kami menolak *verifikasi* Foto KTP anda. \nSilahkan Upload foto KTP lagi untuk melakukan verifikasi lagi"
        );
        $url = "https://wa.me/62"  . $no_hp . "?text=$formatted_message";
        return $url;
    }
}
