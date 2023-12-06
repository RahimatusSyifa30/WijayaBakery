<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['id_user', 'nama_user', 'no_hp_user', 'password', 'alamat', 'ktp', 'verifikasi','foto_profil'];

    public function getPesananByIDUser($id)
    {
        return $this->join('pesanan', 'pesanan.id_user=user.id_user')->where('user.id_user', $id)->first();
    }
    public function getUserByID($id)
    {
        return $this->where('id_user', $id)->first();
    }
    public function getUserNameByID($id)
    {
        return $this->select('nama_user')->where('id_user', $id)->first();
    }
    public function getUserByNoHP($no_hp)
    {
        return $this->where('no_hp_user', $no_hp)->first();
    }
    public function insert_User($data)
    {
        return $this->insert($data);
    }
    public function update_User($id, $data)
    {
        return $this->update($id, $data);
    }
    public function delete_User($id)
    {
        return $this->delete($id);
    }

    public function verif_diterima($id)
    {
        $db = db_connect();
        $db->query('UPDATE user SET verifikasi="Diterima" WHERE id_user=' . $id);    }
    public function verif_dihapus($id)
    {
        $db = db_connect();
        $db->query('UPDATE user SET verifikasi="Belum" WHERE id_user=' . $id);    }
    public function search($cari)
    {
        return $this->table('user')->like('no_hp_user', $cari);
    }
}
