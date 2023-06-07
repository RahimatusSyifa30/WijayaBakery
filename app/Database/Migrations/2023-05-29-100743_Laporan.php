<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Laporan extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'id_laporan'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'id_pesanan'          => [
				'type'           => 'INT',
			],
			'tanggal'       => [
				'type'           => 'TIMESTAMP',
			],
			'modal'      => [
				'type'           => 'BIGINT',
			],
			'keuntungan_kotor' => [
				'type'           => 'BIGINT',
			],
			'keuntungan_bersih'      => [
				'type'           => 'BIGINT',
			],
		]);

		// Membuat primary key
		$this->forge->addKey('id_laporan', TRUE);
		$this->forge->addKey('id_pesanan');

		// Membuat tabel news
		$this->forge->createTable('laporan', TRUE);
		//faker
	// 	$faker = \Faker\Factory::create();
	// 	$data = [];
	// 	for ($i = 1; $i <= 10; $i++) {
	// 		$data[] = [
	// 			'id_pesanan'      =>$faker->randomNumber(1, true),
	// 			'tanggal' =>$faker->unixTime(),
	// 			'modal' =>$faker->randomNumber(5,true),
	// 			'keuntungan_kotor'      =>$faker->randomNumber(5,true),
	// 			'keuntungan_bersih'      =>$faker->randomNumber(5,true),
	// 		];
	// 	}

	// $this->db->table('laporan')->insertBatch($data);
    }

    public function down()
    {
        //
        $this->forge->dropTable('laporan');
    }
}
