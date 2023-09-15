<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KelompokProduk extends Migration
{
    public function up()
    {
        
        $this->forge->addField([
            'id_kel'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                // 'unsigned'       => true,
                'auto_increment' => true
            ],
            'nama_kel'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 10,
            ],
            'gambar_kel'      => [
                'type'           => 'VARCHAR',
                'constraint'    => 50,
            ],
        ]);
        $this->forge->addPrimaryKey('id_kel');
        
        // Membuat tabel news
        $this->forge->createTable('kelompok_produk', TRUE);
        $file = APPPATH . 'Database/Migrations/kelompok_produk.sql'; // Gantilah dengan path lengkap ke file SQL Anda
        $sql = file_get_contents($file);

        if ($sql !== false) {
            $this->db->query($sql);
        }
        //faker
        // $faker = \Faker\Factory::create();
        // $data = [];
        // for ($i = 1; $i <= 10; $i++) {
        //     $data[] = [
        //         'nama_kel' => $faker->word(),
        //         'gambar_kel' => $faker->word(),
        //     ];
        // }

        // $this->db->table('kelompok_produk')->insertBatch($data);

    }

    public function down()
    {
        $this->forge->dropTable('kelompok_produk');
    }
}
