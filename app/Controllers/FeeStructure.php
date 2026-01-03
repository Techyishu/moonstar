<?php

namespace App\Controllers;

use App\Models\FeeStructureModel;

class FeeStructure extends BaseController
{
    public function index()
    {
        $feeModel = new FeeStructureModel();

        // Get all active fee structures
        $fees = $feeModel
            ->where('status', 1)
            ->orderBy('display_order', 'ASC')
            ->findAll();

        $data = [
            'title' => 'Fee Structure - Moonstar School',
            'fees' => $fees,
        ];

        return view('fee-structure/index', $data);
    }
}
