<?php

namespace App\Controllers;

use App\Models\BusRouteModel;

class BusRoutes extends BaseController
{
    public function index()
    {
        $routeModel = new BusRouteModel();

        // Get all active routes
        $routes = $routeModel
            ->where('status', 1)
            ->orderBy('route_number', 'ASC')
            ->findAll();

        $data = [
            'title' => 'Bus Routes & Transport - Moonstar School',
            'routes' => $routes,
        ];

        return view('bus-routes/index', $data);
    }
}
