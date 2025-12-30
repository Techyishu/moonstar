<?php

namespace App\Models;

use CodeIgniter\Model;

class ToppersModel extends Model
{
    protected $table = 'toppers';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'student_name',
        'standard',
        'percentage',
        'rank',
        'batch_year',
        'student_image',
        'testimonial'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Validation
    protected $validationRules = [
        'student_name' => 'required|min_length[3]',
        'percentage' => 'required|decimal',
        'batch_year' => 'required',
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;
}
