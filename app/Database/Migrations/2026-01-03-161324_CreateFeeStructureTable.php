<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFeeStructureTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'class_name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'class_category' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'admission_fee' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'tuition_fee_quarterly' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'annual_charges' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'display_order' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0,
            ],
            'status' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 1,
                'comment' => '1=Active, 0=Inactive',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('fee_structure');
    }

    public function down()
    {
        $this->forge->dropTable('fee_structure');
    }
}
