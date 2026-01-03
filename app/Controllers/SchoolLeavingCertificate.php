<?php

namespace App\Controllers;

use App\Models\SchoolLeavingCertificateModel;

class SchoolLeavingCertificate extends BaseController
{
    protected $slcModel;

    public function __construct()
    {
        $this->slcModel = new SchoolLeavingCertificateModel();
    }

    public function index()
    {
        $search = $this->request->getGet('search');
        $builder = $this->slcModel->where('status', 'active');

        if ($search) {
            $builder = $builder->groupStart()
                ->like('student_name', $search)
                ->orLike('admission_number', $search)
                ->groupEnd();
        }

        $data = [
            'title' => 'School Leaving Certificates',
            'certificates' => $builder->orderBy('leaving_date', 'DESC')->paginate(20),
            'pager' => $this->slcModel->pager,
            'search' => $search,
        ];

        return view('slc/index', $data);
    }
}
