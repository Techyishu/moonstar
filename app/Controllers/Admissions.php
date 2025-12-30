<?php

namespace App\Controllers;

use App\Models\AdmissionModel;

class Admissions extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Admissions',
            'meta_title' => 'Admissions - Apply to Moonstar School',
            'meta_description' => 'Apply for admission to Moonstar School. Learn about our admission process and submit your application online.',
        ];

        return view('admissions/index', $data);
    }

    public function submit()
    {
        $admissionModel = new AdmissionModel();

        // Validation rules
        $rules = [
            'student_name' => 'required|min_length[3]|max_length[255]',
            'date_of_birth' => 'required|valid_date',
            'gender' => 'required|in_list[male,female,other]',
            'class_applied' => 'required',
            'parent_name' => 'required|min_length[3]',
            'parent_email' => 'required|valid_email',
            'parent_phone' => 'required|min_length[10]',
            'address' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Generate unique application number
        $applicationNumber = 'APP' . date('Y') . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);

        $data = [
            'application_number' => $applicationNumber,
            'student_name' => $this->request->getPost('student_name'),
            'date_of_birth' => $this->request->getPost('date_of_birth'),
            'gender' => $this->request->getPost('gender'),
            'class_applied' => $this->request->getPost('class_applied'),
            'parent_name' => $this->request->getPost('parent_name'),
            'parent_email' => $this->request->getPost('parent_email'),
            'parent_phone' => $this->request->getPost('parent_phone'),
            'address' => $this->request->getPost('address'),
            'previous_school' => $this->request->getPost('previous_school'),
            'remarks' => $this->request->getPost('remarks'),
            'application_status' => 'pending',
        ];

        if ($admissionModel->save($data)) {
            return redirect()->to('/admissions')->with(
                'success',
                'Application submitted successfully! Your application number is: ' . $applicationNumber .
                '. Our admissions team will contact you within 2-3 business days.'
            );
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to submit application. Please try again.');
        }
    }
}
