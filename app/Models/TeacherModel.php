<?php

namespace App\Models;

use CodeIgniter\Model;

class TeacherModel extends Model
{
    protected $table = 'teachers';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'employee_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'subject',
        'qualification',
        'joining_date',
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
        'employee_id' => 'required|is_unique[teachers.employee_id,id,{id}]',
        'first_name' => 'required|min_length[2]|max_length[100]',
        'last_name' => 'required|min_length[2]|max_length[100]',
        'email' => 'required|valid_email|is_unique[teachers.email,id,{id}]',
        'phone' => 'required|min_length[10]',
        'subject' => 'required',
        'joining_date' => 'required|valid_date',
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;
}
