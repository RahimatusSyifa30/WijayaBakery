<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                // 'unsigned'       => true,
                'auto_increment' => true
            ],
            'nama_user'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 50,
            ],
            'no_hp_user'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 15,
                'unique' => true
            ],
            'password'      => [
                'type'           => 'VARCHAR',
                'constraint'    => 10,
            ],
            'alamat'      => [
                'type'           => 'LONGTEXT',
            ],
            'ktp'      => [
                'type'           => 'VARCHAR',
                'constraint'    => 50,
            ],
            'verifikasi'      => [
                'type'           => 'VARCHAR',
                'constraint'    => 10,
                'default' => 'Belum',
            ],
            'foto_profil'      => [
                'type'           => 'VARCHAR',
                'constraint'    => 50,
                'default'=>'prof_default.png'
            ],
        ]);
        $this->forge->addPrimaryKey('id_user');
        $data = [
            'nama_user' => 'Inge Dien Safitri',
            'no_hp_user' => '082236047539',
            'password' => 'admin111',
            'verifikasi' => 'Diterima',
            'foto_profil' => 'prof_default.png'
        ];
        // Membuat tabel news
        $this->forge->createTable('user', TRUE);
        $this->db->table('user')->insert($data);
    }

    public function down()
    {
        $this->forge->dropTable('user', TRUE);
    }
}
