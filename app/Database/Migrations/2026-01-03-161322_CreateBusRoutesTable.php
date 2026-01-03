<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBusRoutesTable extends Migration
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
            'route_number' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'route_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'areas_covered' => [
                'type' => 'TEXT',
            ],
            'pickup_time' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'drop_time' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'monthly_fee' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
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
        $this->forge->createTable('bus_routes');
    }

    public function down()
    {
        $this->forge->dropTable('bus_routes');
    }
}
