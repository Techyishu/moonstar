<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PageModel;
use App\Models\AuditLogModel;

class AdminPages extends BaseController
{
    protected $pageModel;
    protected $auditLog;

    public function __construct()
    {
        $this->pageModel = new PageModel();
        $this->auditLog = new AuditLogModel();
    }

    public function index()
    {
        $perPage = 15;
        $search = $this->request->getGet('search');

        $builder = $this->pageModel;

        if ($search) {
            $builder = $builder->groupStart()
                ->like('title', $search)
                ->orLike('slug', $search)
                ->groupEnd();
        }

        $data = [
            'title' => 'Manage Pages',
            'pages' => $builder->orderBy('created_at', 'DESC')->paginate($perPage),
            'pager' => $this->pageModel->pager,
            'search' => $search,
        ];

        return view('admin/pages/index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Create Page'];
        return view('admin/pages/form', $data);
    }

    public function store()
    {
        $rules = [
            'title' => 'required|min_length[3]|max_length[255]',
            'slug' => 'required|alpha_dash|is_unique[pages.slug]',
            'content' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'slug' => $this->request->getPost('slug'),
            'content' => $this->request->getPost('content'),
            'meta_title' => $this->request->getPost('meta_title'),
            'meta_description' => $this->request->getPost('meta_description'),
            'status' => $this->request->getPost('status') ? 1 : 0,
        ];

        if ($this->pageModel->insert($data)) {
            $this->auditLog->logActivity('Created page', 'pages', $this->pageModel->getInsertID(), null, $data);
            return redirect()->to('/admin/pages')->with('success', 'Page created successfully.');
        }

        return redirect()->back()->withInput()->with('error', 'Failed to create page.');
    }

    public function edit($id)
    {
        $page = $this->pageModel->find($id);

        if (!$page) {
            return redirect()->to('/admin/pages')->with('error', 'Page not found.');
        }

        $data = [
            'title' => 'Edit Page',
            'page' => $page,
        ];

        return view('admin/pages/form', $data);
    }

    public function update($id)
    {
        $oldData = $this->pageModel->find($id);

        if (!$oldData) {
            return redirect()->to('/admin/pages')->with('error', 'Page not found.');
        }

        $rules = [
            'title' => 'required|min_length[3]|max_length[255]',
            'slug' => 'required|alpha_dash|is_unique[pages.slug,id,' . $id . ']',
            'content' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'slug' => $this->request->getPost('slug'),
            'content' => $this->request->getPost('content'),
            'meta_title' => $this->request->getPost('meta_title'),
            'meta_description' => $this->request->getPost('meta_description'),
            'status' => $this->request->getPost('status') ? 1 : 0,
        ];

        if ($this->pageModel->update($id, $data)) {
            $this->auditLog->logActivity('Updated page', 'pages', $id, $oldData, $data);
            return redirect()->to('/admin/pages')->with('success', 'Page updated successfully.');
        }

        return redirect()->back()->withInput()->with('error', 'Failed to update page.');
    }

    public function delete($id)
    {
        $page = $this->pageModel->find($id);

        if (!$page) {
            return redirect()->to('/admin/pages')->with('error', 'Page not found.');
        }

        if ($this->pageModel->delete($id)) {
            $this->auditLog->logActivity('Deleted page', 'pages', $id, $page);
            return redirect()->to('/admin/pages')->with('success', 'Page deleted successfully.');
        }

        return redirect()->to('/admin/pages')->with('error', 'Failed to delete page.');
    }
}
