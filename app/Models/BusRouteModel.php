<?php

namespace App\Models;

use CodeIgniter\Model;

class BusRouteModel extends Model
{
    protected $table = 'bus_routes';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'route_number',
        'route_name',
        'areas_covered',
        'pickup_time',
        'drop_time',
        'monthly_fee',
        'status'
    ];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $validationRules = [
        'route_number' => 'required',
        'route_name' => 'required|min_length[3]',
        'areas_covered' => 'required',
        'pickup_time' => 'required',
        'drop_time' => 'required',
        'monthly_fee' => 'required|decimal',
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;
}
