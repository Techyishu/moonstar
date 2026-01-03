<?php

namespace App\Controllers;

use App\Models\PageModel;

class BusRoutes extends BaseController
{
    public function index()
    {
        $pageModel = new PageModel();

        // Check if content exists in database
        $page = $pageModel->where('slug', 'bus-routes')->where('status', 1)->first();

        $data = [
            'title' => 'Bus Routes & Transport - Moonstar School',
            'page' => $page,
        ];

        // If database content exists, use generic view; otherwise use custom template
        if ($page && !empty($page['content'])) {
            return view('pages/view', $data);
        }

        return view('bus-routes/index', $data);
    }
}
