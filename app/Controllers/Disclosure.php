<?php

namespace App\Controllers;

class Disclosure extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Mandatory Public Disclosure - Moonstar School',
        ];

        return view('disclosure/index', $data);
    }
}
