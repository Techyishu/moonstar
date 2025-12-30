<?php

namespace App\Controllers;

use App\Models\EventModel;
use App\Models\NoticeModel;

class PublicHome extends BaseController
{
    public function index()
    {
        $eventModel = new EventModel();
        $noticeModel = new NoticeModel();

        $data = [
            'title' => 'Home',
            'meta_title' => 'Moonstar School - Excellence in Education',
            'meta_description' => 'Moonstar School provides quality education with modern facilities and experienced faculty. Join our community of learners today.',
            'events' => $eventModel->where('status', 1)
                ->where('event_date >=', date('Y-m-d'))
                ->orderBy('event_date', 'ASC')
                ->limit(3)
                ->findAll(),
            'notices' => $noticeModel->where('status', 1)
                ->orderBy('created_at', 'DESC')
                ->limit(5)
                ->findAll(),
        ];

        return view('home/index', $data);
    }
}
