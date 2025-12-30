<?php

namespace App\Controllers;

class Academics extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Academic Programs',
            'meta_title' => 'Academic Programs - Moonstar School',
            'meta_description' => 'Explore comprehensive academic programs at Moonstar School from early childhood through high school, including arts, music, and athletics.',
        ];

        return view('academics/index', $data);
    }
}
