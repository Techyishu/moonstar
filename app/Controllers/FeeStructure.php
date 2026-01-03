<?php

namespace App\Controllers;

class FeeStructure extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Fee Structure - Moonstar School',
        ];

        return view('fee-structure/index', $data);
    }
}
