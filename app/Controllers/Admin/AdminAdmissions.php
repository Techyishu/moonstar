<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdmissionModel;
use App\Models\AuditLogModel;

class AdminAdmissions extends BaseController
{
    protected $admissionModel;
    protected $auditLog;

    public function __construct()
    {
        $this->admissionModel = new AdmissionModel();
        $this->auditLog = new AuditLogModel();
    }

    public function index()
    {
        $perPage = 15;
        $search = $this->request->getGet('search');
        $status = $this->request->getGet('status');

        $builder = $this->admissionModel;

        if ($search) {
            $builder = $builder->groupStart()
                ->like('student_name', $search)
                ->orLike('application_number', $search)
                ->orLike('parent_email', $search)
                ->groupEnd();
        }

        if ($status) {
            $builder = $builder->where('application_status', $status);
        }

        $data = [
            'title' => 'Manage Admissions',
            'admissions' => $builder->orderBy('created_at', 'DESC')->paginate($perPage),
            'pager' => $this->admissionModel->pager,
            'search' => $search,
            'status' => $status,
        ];

        return view('admin/admissions/index', $data);
    }

    public function view($id)
    {
        $admission = $this->admissionModel->find($id);

        if (!$admission) {
            return redirect()->to('/admin/admissions')->with('error', 'Application not found.');
        }

        $data = [
            'title' => 'View Application',
            'admission' => $admission,
        ];

        return view('admin/admissions/view', $data);
    }

    public function updateStatus($id)
    {
        $admission = $this->admissionModel->find($id);

        if (!$admission) {
            return redirect()->to('/admin/admissions')->with('error', 'Application not found.');
        }

        $newStatus = $this->request->getPost('status');
        $remarks = $this->request->getPost('remarks');

        if (!in_array($newStatus, ['pending', 'accepted', 'rejected'])) {
            return redirect()->back()->with('error', 'Invalid status.');
        }

        $data = [
            'application_status' => $newStatus,
            'remarks' => $remarks,
        ];

        if ($this->admissionModel->update($id, $data)) {
            $this->auditLog->logActivity('Updated admission status to ' . $newStatus, 'admissions', $id, $admission, $data);
            return redirect()->back()->with('success', 'Application status updated successfully.');
        }

        return redirect()->back()->with('error', 'Failed to update status.');
    }

    public function exportCSV()
    {
        $admissions = $this->admissionModel->orderBy('created_at', 'DESC')->findAll();

        $filename = 'admissions_' . date('Y-m-d_His') . '.csv';

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        $output = fopen('php://output', 'w');

        // CSV Headers
        fputcsv($output, [
            'Application Number',
            'Student Name',
            'Date of Birth',
            'Gender',
            'Class Applied',
            'Parent Name',
            'Parent Email',
            'Parent Phone',
            'Status',
            'Applied On',
        ]);

        // CSV Data
        foreach ($admissions as $admission) {
            fputcsv($output, [
                $admission['application_number'],
                $admission['student_name'],
                $admission['date_of_birth'],
                $admission['gender'],
                $admission['class_applied'],
                $admission['parent_name'],
                $admission['parent_email'],
                $admission['parent_phone'],
                ucfirst($admission['application_status']),
                date('Y-m-d H:i:s', strtotime($admission['created_at'])),
            ]);
        }

        fclose($output);

        $this->auditLog->logActivity('Exported admissions to CSV');

        exit;
    }

    public function delete($id)
    {
        $admission = $this->admissionModel->find($id);

        if (!$admission) {
            return redirect()->to('/admin/admissions')->with('error', 'Application not found.');
        }

        if ($this->admissionModel->delete($id)) {
            $this->auditLog->logActivity('Deleted admission', 'admissions', $id, $admission);
            return redirect()->to('/admin/admissions')->with('success', 'Application deleted successfully.');
        }

        return redirect()->to('/admin/admissions')->with('error', 'Failed to delete application.');
    }
}
