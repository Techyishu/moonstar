<?php

namespace App\Controllers;

use App\Models\PageModel;

class Sports extends BaseController
{
    public function index()
    {
        $pageModel = new PageModel();

        // Check if content exists in database
        $page = $pageModel->where('slug', 'sports')->where('status', 1)->first();

        $data = [
            'title' => 'Sports & Facilities - Moonstar School',
            'page' => $page,
        ];

        // If database content exists, use generic view; otherwise use custom template
        if ($page && !empty($page['content'])) {
            return view('pages/view', $data);
        }

        return view('sports/index', $data);
    }
}
