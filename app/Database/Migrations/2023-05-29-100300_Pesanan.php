<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pesanan extends Migration
{

	public function up()
	{

		$this->forge->addField([
			'id_pesanan'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				// 'unsigned'       => true,
				'auto_increment' => true
			],
			'tanggal'       => [
				'type'           => 'TIMESTAMP',
			],
			'tanggal_pengambilan'       => [
				'type'           => 'DATE',
			],
			'id_user'      => [
				'type'           => 'INT',
				// 'unsigned'       => true,
			],
			'status'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 10,
				'default' => 'Belum',
			],
			'total_modal'      => [
				'type'           => 'BIGINT',
			],
			'total_harga'      => [
				'type'           => 'BIGINT',
			],
		]);
		$this->forge->addKey('id_pesanan', TRUE);
		$this->forge->addForeignKey('id_user', 'user', 'id_user', 'CASCADE', 'CASCADE');
		// Membuat tabel news
		$this->forge->createTable('pesanan', TRUE);
		// //faker
		// $faker = \Faker\Factory::create();
		// $data = [];
		// for ($i = 1; $i <= 100; $i++) {
		// 	$data[] = [
		// 		'nama_pelanggan' => $faker->name(),
		// 		'no_hp_pelanggan' => $faker->phoneNumber(),
		// 		'total_modal'      => $faker->randomNumber(5, true),
		// 		'total_harga'      => $faker->randomNumber(5, true),
		// 		'status'      => "Selesai"
		// 	];
		// }
		// $this->db->table('pesanan')->insertBatch($data);
	}

	public function down()
	{
		$this->forge->dropTable('pesanan');
	}
}
