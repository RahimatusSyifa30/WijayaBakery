<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Produk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_produk'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                // 'unsigned'       => true,
                'auto_increment' => true
            ],
            'nama_produk'       => [
                'type'           => 'VARCHAR',
                'constraint'    =>30,
            ],
            'jenis_produk'      => [
                'type'           => 'INT',
                // 'unsigned'       => true,
                // 'constraint'    =>1,
            ],
            'stok_produk' => [
                'type'           => 'INT',
            ],
            'modal_produk'      => [
                'type'           => 'BIGINT',
            ],
            'harga_produk'      => [
                'type'           => 'BIGINT',
            ],
            'informasi_produk'      => [
                'type'           => 'LONGTEXT',
            ],
            'gambar_produk'      => [
                'type'           => 'VARCHAR',
                'constraint'    => 50,
            ],
        ]);
        $this->forge->addKey('id_produk', TRUE);
        $this->forge->addForeignKey('jenis_produk','kelompok_produk','id_kel','CASCADE','CASCADE');

        
        // Membuat tabel news
        $this->forge->createTable('produk', TRUE);
        $file = APPPATH . 'Database/Migrations/produk.sql'; // Gantilah dengan path lengkap ke file SQL Anda
        $sql = file_get_contents($file);

        if ($sql !== false) {
            $this->db->query($sql);
        }
        //faker
        // $faker = \Faker\Factory::create();
        // $data = [];
        // for ($i = 1; $i <= 10; $i++) {
        //     $data[] = [
        //         'nama_produk' => $faker->word(),
        //         'jenis_produk'      =>$i,
        //         'stok_produk' =>$faker->randomNumber(2, true),
        //         'modal_produk' =>$faker->randomNumber(5,true),
        //         'harga_produk'      =>$faker->randomNumber(5,true),
        //         'informasi_produk'      =>$faker->sentence(10),
        //         'gambar_produk'      =>$faker->word()

        //     ];
        // }

        // $this->db->table('produk')->insertBatch($data);
    }

    public function down()
    {
        $this->forge->dropTable('produk');
    }
}
