<?php

namespace App\Controllers;

use App\Models\PageModel;

class Pages extends BaseController
{
    public function view($slug)
    {
        $pageModel = new PageModel();

        $page = $pageModel->where('slug', $slug)
            ->where('status', 1)
            ->first();

        if (!$page) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Page not found: ' . $slug
            );
        }

        $data = [
            'title' => $page['title'],
            'meta_title' => $page['meta_title'] ?? $page['title'] . ' - Moonstar School',
            'meta_description' => $page['meta_description'] ?? '',
            'page' => $page,
        ];

        return view('pages/view', $data);
    }
}
