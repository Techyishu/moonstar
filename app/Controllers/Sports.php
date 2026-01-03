<?php

namespace App\Controllers;

class Sports extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Sports & Facilities - Moonstar School',
        ];

        return view('sports/index', $data);
    }
}
