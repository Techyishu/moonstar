<?php

namespace App\Models;

use CodeIgniter\Model;

class DisclosureDocumentModel extends Model
{
    protected $table = 'disclosure_documents';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'title',
        'description',
        'document_file',
        'category',
        'display_order',
        'status'
    ];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $validationRules = [
        'title' => 'required|min_length[3]|max_length[255]',
        'category' => 'required',
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;
}
