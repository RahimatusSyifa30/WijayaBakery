<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailPesanan extends Migration
{
    public function up()
    {
        
            $this->forge->addField([
                'id_detail'          => [
                    'type'           => 'INT',
                    'constraint'     => 5,
                    // 'unsigned'       => true,
                    'auto_increment' => true
                ],
                'id_pesanan'       => [
                    'type'           => 'INT',
                    // 'unsigned'       => true,
                ],
                'id_produk'      => [
                    'type'           => 'INT',
                    // 'unsigned'       => true,
                ],
                'kuantitas' => [
                    'type'           => 'VARCHAR',
                    'constraint'     => 15,
                ],
                'sub_modal'      => [
                    'type'           => 'BIGINT',
                ],
                'sub_total'      => [
                    'type'           => 'BIGINT',
                ],
            ]);
            $this->forge->addKey('id_detail', TRUE);
            $this->forge->addForeignKey('id_pesanan','pesanan','id_pesanan','CASCADE','CASCADE');
            $this->forge->addForeignKey('id_produk','produk','id_produk','CASCADE','CASCADE');
    
            // Membuat tabel news
            $this->forge->createTable('detail_pesanan', TRUE);
            //faker
        //     $faker = \Faker\Factory::create();
        //     $data = [];
        //     for ($i = 1; $i <= 10; $i++) {
        //         $data[] = [
        //             'id_pesanan'      =>1,
        //             'id_produk' =>$faker->randomNumber(1, true),
        //             'kuantitas' =>$faker->randomNumber(2,true),
        //             'sub_modal'      =>$faker->randomNumber(5,true),
        //             'sub_total'      =>$faker->randomNumber(5,true),
        //         ];
        //     }

        // $this->db->table('detail_pesanan')->insertBatch($data);
    }

    public function down()
    {
        $this->forge->dropTable('detail_pesanan');

    }
}
