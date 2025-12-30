<?php



use CodeIgniter\Database\Migration;

class CreateToppersTable extends Migration
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
            'student_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'standard' => [ // 'class' is a keyword, using 'standard' or 'grade'
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'percentage' => [
                'type' => 'DECIMAL',
                'constraint' => '5,2',
            ],
            'rank' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
                'comment' => 'e.g., State Rank 1, School Topper',
            ],
            'batch_year' => [
                'type' => 'VARCHAR',
                'constraint' => 9,
                'comment' => 'e.g., 2024-2025',
            ],
            'student_image' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'testimonial' => [
                'type' => 'TEXT',
                'null' => true,
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
        $this->forge->createTable('toppers');
    }

    public function down()
    {
        $this->forge->dropTable('toppers');
    }
}
