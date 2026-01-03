<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSchoolLeavingCertificatesTable extends Migration
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
                'constraint' => '255',
            ],
            'admission_number' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'date_of_birth' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'father_name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'mother_name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'class_leaving' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => true,
            ],
            'leaving_date' => [
                'type' => 'DATE',
            ],
            'reason' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'certificate_file' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['active', 'inactive'],
                'default' => 'active',
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
        $this->forge->createTable('school_leaving_certificates');
    }

    public function down()
    {
        $this->forge->dropTable('school_leaving_certificates');
    }
}
