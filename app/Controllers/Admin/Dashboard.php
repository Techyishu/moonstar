<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\StudentModel;
use App\Models\TeacherModel;
use App\Models\AdmissionModel;
use App\Models\EventModel;
use App\Models\NoticeModel;
use App\Models\PageModel;
use App\Models\UserModel;
use App\Models\AuditLogModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Admin Dashboard',
            'students_count' => (new StudentModel())->countAll(),
            'teachers_count' => (new TeacherModel())->countAll(),
            'admissions_pending' => (new AdmissionModel())->where('application_status', 'pending')->countAllResults(),
            'events_upcoming' => (new EventModel())->where('event_date >=', date('Y-m-d'))->countAllResults(),
            'notices_active' => (new NoticeModel())->where('status', 1)->countAllResults(),
            'pages_count' => (new PageModel())->countAll(),
            'users_count' => (new UserModel())->countAll(),
            'recent_activities' => (new AuditLogModel())->getRecentActivities(10),
        ];

        return view('admin/dashboard', $data);
    }
}
