<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\FeeStructureModel;
use App\Models\AuditLogModel;

class FeeStructure extends BaseController
{
    protected $feeModel;
    protected $auditLog;

    public function __construct()
    {
        $this->feeModel = new FeeStructureModel();
        $this->auditLog = new AuditLogModel();
    }

    public function index()
    {
        $perPage = 15;
        $search = $this->request->getGet('search');

        $builder = $this->feeModel;

        if ($search) {
            $builder = $builder->like('class_name', $search);
        }

        $data = [
            'title' => 'Fee Structure',
            'fees' => $builder->orderBy('display_order', 'ASC')->paginate($perPage),
            'pager' => $this->feeModel->pager,
            'search' => $search,
        ];

        return view('admin/fee-structure/index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Add Fee Structure'];
        return view('admin/fee-structure/form', $data);
    }

    public function store()
    {
        $rules = [
            'class_name' => 'required|min_length[3]',
            'admission_fee' => 'required|decimal',
            'tuition_fee_quarterly' => 'required|decimal',
            'annual_charges' => 'required|decimal',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'class_name' => $this->request->getPost('class_name'),
            'class_category' => $this->request->getPost('class_category'),
            'admission_fee' => $this->request->getPost('admission_fee'),
            'tuition_fee_quarterly' => $this->request->getPost('tuition_fee_quarterly'),
            'annual_charges' => $this->request->getPost('annual_charges'),
            'display_order' => $this->request->getPost('display_order') ?? 0,
            'status' => $this->request->getPost('status') ?? 1,
        ];

        if ($this->feeModel->insert($data)) {
            $this->auditLog->logActivity('Created Fee Structure', 'fee_structure', $this->feeModel->getInsertID(), null, $data);
            return redirect()->to('/admin/fee-structure')->with('success', 'Fee structure added successfully.');
        }

        return redirect()->back()->withInput()->with('error', 'Failed to add fee structure.');
    }

    public function edit($id)
    {
        $fee = $this->feeModel->find($id);

        if (!$fee) {
            return redirect()->to('/admin/fee-structure')->with('error', 'Fee structure not found.');
        }

        $data = [
            'title' => 'Edit Fee Structure',
            'fee' => $fee,
        ];

        return view('admin/fee-structure/form', $data);
    }

    public function update($id)
    {
        $oldData = $this->feeModel->find($id);

        if (!$oldData) {
            return redirect()->to('/admin/fee-structure')->with('error', 'Fee structure not found.');
        }

        $rules = [
            'class_name' => 'required|min_length[3]',
            'admission_fee' => 'required|decimal',
            'tuition_fee_quarterly' => 'required|decimal',
            'annual_charges' => 'required|decimal',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'class_name' => $this->request->getPost('class_name'),
            'class_category' => $this->request->getPost('class_category'),
            'admission_fee' => $this->request->getPost('admission_fee'),
            'tuition_fee_quarterly' => $this->request->getPost('tuition_fee_quarterly'),
            'annual_charges' => $this->request->getPost('annual_charges'),
            'display_order' => $this->request->getPost('display_order') ?? 0,
            'status' => $this->request->getPost('status') ?? 1,
        ];

        if ($this->feeModel->update($id, $data)) {
            $this->auditLog->logActivity('Updated Fee Structure', 'fee_structure', $id, $oldData, $data);
            return redirect()->to('/admin/fee-structure')->with('success', 'Fee structure updated successfully.');
        }

        return redirect()->back()->withInput()->with('error', 'Failed to update fee structure.');
    }

    public function delete($id)
    {
        $fee = $this->feeModel->find($id);

        if (!$fee) {
            return redirect()->to('/admin/fee-structure')->with('error', 'Fee structure not found.');
        }

        if ($this->feeModel->delete($id)) {
            $this->auditLog->logActivity('Deleted Fee Structure', 'fee_structure', $id, $fee);
            return redirect()->to('/admin/fee-structure')->with('success', 'Fee structure deleted successfully.');
        }

        return redirect()->to('/admin/fee-structure')->with('error', 'Failed to delete fee structure.');
    }
}
