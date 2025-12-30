<?php



use CodeIgniter\Database\Migration;

class CreateAdmissionsTable extends Migration
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
            'application_number' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'unique' => true,
            ],
            'student_name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'date_of_birth' => [
                'type' => 'DATE',
            ],
            'gender' => [
                'type' => 'ENUM',
                'constraint' => ['male', 'female', 'other'],
            ],
            'class_applied' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'parent_name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'parent_phone' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'parent_email' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'address' => [
                'type' => 'TEXT',
            ],
            'previous_school' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'application_status' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'approved', 'rejected', 'admitted'],
                'default' => 'pending',
            ],
            'remarks' => [
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
        $this->forge->createTable('admissions');
    }

    public function down()
    {
        $this->forge->dropTable('admissions');
    }
}
