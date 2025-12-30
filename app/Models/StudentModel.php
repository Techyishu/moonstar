<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table = 'students';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'admission_number',
        'first_name',
        'last_name',
        'date_of_birth',
        'gender',
        'class',
        'section',
        'parent_name',
        'parent_phone',
        'parent_email',
        'address',
        'photo',
        'status'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Validation
    protected $validationRules = [
        'admission_number' => 'required|is_unique[students.admission_number,id,{id}]',
        'first_name' => 'required|min_length[2]|max_length[100]',
        'last_name' => 'required|min_length[2]|max_length[100]',
        'date_of_birth' => 'required|valid_date',
        'gender' => 'required|in_list[male,female,other]',
        'class' => 'required',
        'parent_name' => 'required',
        'parent_phone' => 'required|min_length[10]',
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;
}
