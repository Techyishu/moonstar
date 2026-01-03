<?php

namespace App\Models;

use CodeIgniter\Model;

class SchoolLeavingCertificateModel extends Model
{
    protected $table = 'school_leaving_certificates';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'student_name',
        'admission_number',
        'date_of_birth',
        'father_name',
        'mother_name',
        'class_leaving',
        'leaving_date',
        'reason',
        'certificate_file',
        'status',
        'created_at',
        'updated_at'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;
}
