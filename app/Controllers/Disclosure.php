<?php

namespace App\Controllers;

use App\Models\DisclosureDocumentModel;

class Disclosure extends BaseController
{
    public function index()
    {
        $documentModel = new DisclosureDocumentModel();

        // Get all active documents ordered by display order
        $documents = $documentModel
            ->where('status', 1)
            ->orderBy('display_order', 'ASC')
            ->orderBy('created_at', 'DESC')
            ->findAll();

        $data = [
            'title' => 'Mandatory Public Disclosure - Moonstar School',
            'documents' => $documents,
        ];

        return view('disclosure/index', $data);
    }
}
