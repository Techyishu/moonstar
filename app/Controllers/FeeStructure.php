<?php

namespace App\Controllers;

use App\Models\PageModel;

class FeeStructure extends BaseController
{
    public function index()
    {
        $pageModel = new PageModel();

        // Check if content exists in database
        $page = $pageModel->where('slug', 'fee-structure')->where('status', 1)->first();

        $data = [
            'title' => 'Fee Structure - Moonstar School',
            'page' => $page,
        ];

        // If database content exists, use generic view; otherwise use custom template
        if ($page && !empty($page['content'])) {
            return view('pages/view', $data);
        }

        return view('fee-structure/index', $data);
    }
}
