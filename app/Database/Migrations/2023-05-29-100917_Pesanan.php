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
				'unsigned'       => true,
				'auto_increment' => true
			],
			'tanggal'       => [
				'type'           => 'TIMESTAMP',
			],
			'nama_pelanggan'      => [
				'type'           => 'VARCHAR',
                'constraint'     => 50,
			],
			'no_hp_pelanggan' => [
				'type'           => 'VARCHAR',
                'constraint'     => 15,
			],
			'status'      => [
				'type'           => 'VARCHAR',
                'default' => 'Belum'
			],
			'total_modal'      => [
				'type'           => 'BIGINT',
			],
			'total_harga'      => [
				'type'           => 'BIGINT',
			],
		]);
        $this->forge->addKey('id_pesanan', TRUE);

		// Membuat tabel news
		$this->forge->createTable('pesanan', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('pesanan');

    }
}
