<?php

namespace App\Models;

use CodeIgniter\Model;

class FeeStructureModel extends Model
{
    protected $table = 'fee_structure';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'class_name',
        'class_category',
        'admission_fee',
        'tuition_fee_quarterly',
        'annual_charges',
        'display_order',
        'status'
    ];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $validationRules = [
        'class_name' => 'required|min_length[3]',
        'admission_fee' => 'required|decimal',
        'tuition_fee_quarterly' => 'required|decimal',
        'annual_charges' => 'required|decimal',
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;
}
