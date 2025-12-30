<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Welcome to Moonstar School Management System',
        ];
        return view('layouts/main', $data);
    }
}
