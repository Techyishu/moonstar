<?php

namespace App\Controllers;

use App\Models\GalleryModel;

class Gallery extends BaseController
{
    public function index()
    {
        $galleryModel = new GalleryModel();

        $data = [
            'title' => 'Photo Gallery',
            'meta_title' => 'Gallery - Moonstar School',
            'meta_description' => 'Explore photos from Moonstar School events, facilities, academics, and sports activities.',
            'gallery' => $galleryModel->where('status', 1)
                ->orderBy('display_order', 'ASC')
                ->orderBy('created_at', 'DESC')
                ->findAll(),
        ];

        return view('gallery/index', $data);
    }
}
