<?php

namespace App\Models;

use CodeIgniter\Model;

class AdmissionModel extends Model
{
    protected $table = 'admissions';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'application_number',
        'student_name',
        'date_of_birth',
        'gender',
        'class_applied',
        'parent_name',
        'parent_phone',
        'parent_email',
        'address',
        'previous_school',
        'application_status',
        'remarks'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Validation
    protected $validationRules = [
        'application_number' => 'required|is_unique[admissions.application_number,id,{id}]',
        'student_name' => 'required|min_length[3]',
        'date_of_birth' => 'required|valid_date',
        'gender' => 'required|in_list[male,female,other]',
        'class_applied' => 'required',
        'parent_name' => 'required',
        'parent_phone' => 'required|min_length[10]',
        'parent_email' => 'required|valid_email',
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;
}
