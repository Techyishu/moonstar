<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SchoolLeavingCertificateModel;
use App\Models\AuditLogModel;

class SchoolLeavingCertificates extends BaseController
{
    protected $slcModel;
    protected $auditLog;

    public function __construct()
    {
        $this->slcModel = new SchoolLeavingCertificateModel();
        $this->auditLog = new AuditLogModel();
    }

    public function index()
    {
        $perPage = 15;
        $search = $this->request->getGet('search');

        $builder = $this->slcModel;

        if ($search) {
            $builder = $builder->groupStart()
                ->like('student_name', $search)
                ->orLike('admission_number', $search)
                ->groupEnd();
        }

        $data = [
            'title' => 'School Leaving Certificates',
            'certificates' => $builder->orderBy('created_at', 'DESC')->paginate($perPage),
            'pager' => $this->slcModel->pager,
            'search' => $search,
        ];

        return view('admin/slc/index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Issue New Certificate'];
        return view('admin/slc/form', $data);
    }

    public function store()
    {
        $rules = [
            'student_name' => 'required|min_length[3]',
            'admission_number' => 'required',
            'leaving_date' => 'required|valid_date',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'student_name' => $this->request->getPost('student_name'),
            'admission_number' => $this->request->getPost('admission_number'),
            'date_of_birth' => $this->request->getPost('date_of_birth'),
            'father_name' => $this->request->getPost('father_name'),
            'mother_name' => $this->request->getPost('mother_name'),
            'class_leaving' => $this->request->getPost('class_leaving'),
            'leaving_date' => $this->request->getPost('leaving_date'),
            'reason' => $this->request->getPost('reason'),
            'status' => $this->request->getPost('status') ?? 'active',
        ];

        // Handle file upload
        $file = $this->request->getFile('certificate_file');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/slc', $newName);
            $data['certificate_file'] = $newName;
        }

        if ($this->slcModel->insert($data)) {
            $this->auditLog->logActivity('Created SLC', 'school_leaving_certificates', $this->slcModel->getInsertID(), null, $data);
            return redirect()->to('/admin/slc')->with('success', 'Certificate issued successfully.');
        }

        return redirect()->back()->withInput()->with('error', 'Failed to issue certificate.');
    }

    public function edit($id)
    {
        $slc = $this->slcModel->find($id);

        if (!$slc) {
            return redirect()->to('/admin/slc')->with('error', 'Certificate not found.');
        }

        $data = [
            'title' => 'Edit Certificate',
            'slc' => $slc,
        ];

        return view('admin/slc/form', $data);
    }

    public function update($id)
    {
        $oldData = $this->slcModel->find($id);

        if (!$oldData) {
            return redirect()->to('/admin/slc')->with('error', 'Certificate not found.');
        }

        $rules = [
            'student_name' => 'required|min_length[3]',
            'admission_number' => 'required',
            'leaving_date' => 'required|valid_date',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'student_name' => $this->request->getPost('student_name'),
            'admission_number' => $this->request->getPost('admission_number'),
            'date_of_birth' => $this->request->getPost('date_of_birth'),
            'father_name' => $this->request->getPost('father_name'),
            'mother_name' => $this->request->getPost('mother_name'),
            'class_leaving' => $this->request->getPost('class_leaving'),
            'leaving_date' => $this->request->getPost('leaving_date'),
            'reason' => $this->request->getPost('reason'),
            'status' => $this->request->getPost('status') ?? 'active',
        ];

        // Handle file upload
        $file = $this->request->getFile('certificate_file');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Delete old file
            if ($oldData['certificate_file'] && file_exists(FCPATH . 'uploads/slc/' . $oldData['certificate_file'])) {
                unlink(FCPATH . 'uploads/slc/' . $oldData['certificate_file']);
            }

            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/slc', $newName);
            $data['certificate_file'] = $newName;
        }

        if ($this->slcModel->update($id, $data)) {
            $this->auditLog->logActivity('Updated SLC', 'school_leaving_certificates', $id, $oldData, $data);
            return redirect()->to('/admin/slc')->with('success', 'Certificate updated successfully.');
        }

        return redirect()->back()->withInput()->with('error', 'Failed to update certificate.');
    }

    public function delete($id)
    {
        $slc = $this->slcModel->find($id);

        if (!$slc) {
            return redirect()->to('/admin/slc')->with('error', 'Certificate not found.');
        }

        // Delete file if exists
        if ($slc['certificate_file'] && file_exists(FCPATH . 'uploads/slc/' . $slc['certificate_file'])) {
            unlink(FCPATH . 'uploads/slc/' . $slc['certificate_file']);
        }

        if ($this->slcModel->delete($id)) {
            $this->auditLog->logActivity('Deleted SLC', 'school_leaving_certificates', $id, $slc);
            return redirect()->to('/admin/slc')->with('success', 'Certificate deleted successfully.');
        }

        return redirect()->to('/admin/slc')->with('error', 'Failed to delete certificate.');
    }
}
