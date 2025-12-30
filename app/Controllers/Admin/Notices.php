<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\NoticeModel;
use App\Models\AuditLogModel;

class Notices extends BaseController
{
    protected $noticeModel;
    protected $auditLog;

    public function __construct()
    {
        $this->noticeModel = new NoticeModel();
        $this->auditLog = new AuditLogModel();
    }

    public function index()
    {
        $perPage = 15;
        $search = $this->request->getGet('search');

        $builder = $this->noticeModel;

        if ($search) {
            $builder = $builder->groupStart()
                ->like('title', $search)
                ->orLike('content', $search)
                ->groupEnd();
        }

        $data = [
            'title' => 'Manage Notices',
            'notices' => $builder->orderBy('created_at', 'DESC')->paginate($perPage),
            'pager' => $this->noticeModel->pager,
            'search' => $search,
        ];

        return view('admin/notices/index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Create Notice'];
        return view('admin/notices/form', $data);
    }

    public function store()
    {
        $rules = [
            'title' => 'required|min_length[3]|max_length[255]',
            'content' => 'required',
            'priority' => 'required|in_list[low,medium,high]',
            'target_audience' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'priority' => $this->request->getPost('priority'),
            'target_audience' => $this->request->getPost('target_audience'),
            'status' => $this->request->getPost('status') ? 1 : 0,
        ];

        // Handle file upload
        $file = $this->request->getFile('attachment');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/notices', $newName);
            $data['attachment'] = $newName;
        }

        if ($this->noticeModel->insert($data)) {
            $this->auditLog->logActivity('Created notice', 'notices', $this->noticeModel->getInsertID(), null, $data);
            return redirect()->to('/admin/notices')->with('success', 'Notice created successfully.');
        }

        return redirect()->back()->withInput()->with('error', 'Failed to create notice.');
    }

    public function edit($id)
    {
        $notice = $this->noticeModel->find($id);

        if (!$notice) {
            return redirect()->to('/admin/notices')->with('error', 'Notice not found.');
        }

        $data = [
            'title' => 'Edit Notice',
            'notice' => $notice,
        ];

        return view('admin/notices/form', $data);
    }

    public function update($id)
    {
        $oldData = $this->noticeModel->find($id);

        if (!$oldData) {
            return redirect()->to('/admin/notices')->with('error', 'Notice not found.');
        }

        $rules = [
            'title' => 'required|min_length[3]|max_length[255]',
            'content' => 'required',
            'priority' => 'required|in_list[low,medium,high]',
            'target_audience' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'priority' => $this->request->getPost('priority'),
            'target_audience' => $this->request->getPost('target_audience'),
            'status' => $this->request->getPost('status') ? 1 : 0,
        ];

        // Handle file upload
        $file = $this->request->getFile('attachment');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Delete old file
            if ($oldData['attachment'] && file_exists(FCPATH . 'uploads/notices/' . $oldData['attachment'])) {
                unlink(FCPATH . 'uploads/notices/' . $oldData['attachment']);
            }

            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/notices', $newName);
            $data['attachment'] = $newName;
        }

        if ($this->noticeModel->update($id, $data)) {
            $this->auditLog->logActivity('Updated notice', 'notices', $id, $oldData, $data);
            return redirect()->to('/admin/notices')->with('success', 'Notice updated successfully.');
        }

        return redirect()->back()->withInput()->with('error', 'Failed to update notice.');
    }

    public function delete($id)
    {
        $notice = $this->noticeModel->find($id);

        if (!$notice) {
            return redirect()->to('/admin/notices')->with('error', 'Notice not found.');
        }

        // Delete file if exists
        if ($notice['attachment'] && file_exists(FCPATH . 'uploads/notices/' . $notice['attachment'])) {
            unlink(FCPATH . 'uploads/notices/' . $notice['attachment']);
        }

        if ($this->noticeModel->delete($id)) {
            $this->auditLog->logActivity('Deleted notice', 'notices', $id, $notice);
            return redirect()->to('/admin/notices')->with('success', 'Notice deleted successfully.');
        }

        return redirect()->to('/admin/notices')->with('error', 'Failed to delete notice.');
    }
}
