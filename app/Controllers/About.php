<?php

namespace App\Controllers;

use App\Models\TeacherModel;

class About extends BaseController
{
    public function index()
    {
        $teacherModel = new TeacherModel();

        $data = [
            'title' => 'About Us',
            'meta_title' => 'About Moonstar School - Our History, Mission & Vision',
            'meta_description' => 'Learn about Moonstar School\'s history, mission, vision, core values, and meet our dedicated leadership team.',
            'leadership' => $teacherModel->where('status', 1)
                ->limit(6)
                ->findAll(),
        ];

        return view('about/index', $data);
    }
}
