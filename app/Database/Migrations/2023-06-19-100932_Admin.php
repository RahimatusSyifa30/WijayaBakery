<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admin extends Migration
{
    public function up()
    {
              
        $this->forge->addField([
            'id_admin'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                // 'unsigned'       => true,
                'auto_increment' => true
            ],
            'username'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 10,
            ],
            'password'      => [
                'type'           => 'VARCHAR',
                'constraint'    => 10,
            ],
        ]);
        $this->forge->addPrimaryKey('id_admin');
        $data= [
            			'username' =>'admin',
            			'password' =>'admin',
            		];
        // Membuat tabel news
        $this->forge->createTable('admin', TRUE);
        $this->db->table('admin')->insert($data);
    }

    public function down()
    {
        $this->forge->dropTable('admin', TRUE);
    }
}
