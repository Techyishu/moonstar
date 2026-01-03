<?php

namespace App\Controllers;

class BusRoutes extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Bus Routes & Transport - Moonstar School',
        ];

        return view('bus-routes/index', $data);
    }
}
