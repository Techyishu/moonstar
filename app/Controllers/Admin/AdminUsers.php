<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\AuditLogModel;

class AdminUsers extends BaseController
{
    protected $userModel;
    protected $auditLog;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->auditLog = new AuditLogModel();
    }

    public function index()
    {
        // Only superadmin can access
        if (session()->get('role') !== 'superadmin') {
            return redirect()->to('/admin/dashboard')->with('error', 'Access denied. Superadmin only.');
        }

        $perPage = 15;
        $search = $this->request->getGet('search');
        $role = $this->request->getGet('role');

        $builder = $this->userModel;

        if ($search) {
            $builder = $builder->groupStart()
                ->like('name', $search)
                ->orLike('email', $search)
                ->groupEnd();
        }

        if ($role) {
            $builder = $builder->where('role', $role);
        }

        $data = [
            'title' => 'Manage Users',
            'users' => $builder->orderBy('created_at', 'DESC')->paginate($perPage),
            'pager' => $this->userModel->pager,
            'search' => $search,
            'role' => $role,
        ];

        return view('admin/users/index', $data);
    }

    public function create()
    {
        if (session()->get('role') !== 'superadmin') {
            return redirect()->to('/admin/dashboard')->with('error', 'Access denied.');
        }

        $data = ['title' => 'Create User'];
        return view('admin/users/form', $data);
    }

    public function store()
    {
        if (session()->get('role') !== 'superadmin') {
            return redirect()->to('/admin/dashboard')->with('error', 'Access denied.');
        }

        $rules = [
            'name' => 'required|min_length[3]|max_length[255]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'role' => 'required|in_list[superadmin,staff,admission_officer]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'), // Will be hashed by model
            'role' => $this->request->getPost('role'),
            'status' => $this->request->getPost('status') ? 1 : 0,
        ];

        if ($this->userModel->insert($data)) {
            $this->auditLog->logActivity('Created user', 'users', $this->userModel->getInsertID(), null, array_diff_key($data, ['password' => '']));
            return redirect()->to('/admin/users')->with('success', 'User created successfully.');
        }

        return redirect()->back()->withInput()->with('error', 'Failed to create user.');
    }

    public function edit($id)
    {
        if (session()->get('role') !== 'superadmin') {
            return redirect()->to('/admin/dashboard')->with('error', 'Access denied.');
        }

        $user = $this->userModel->find($id);

        if (!$user) {
            return redirect()->to('/admin/users')->with('error', 'User not found.');
        }

        $data = [
            'title' => 'Edit User',
            'user' => $user,
        ];

        return view('admin/users/form', $data);
    }

    public function update($id)
    {
        if (session()->get('role') !== 'superadmin') {
            return redirect()->to('/admin/dashboard')->with('error', 'Access denied.');
        }

        $oldData = $this->userModel->find($id);

        if (!$oldData) {
            return redirect()->to('/admin/users')->with('error', 'User not found.');
        }

        $rules = [
            'name' => 'required|min_length[3]|max_length[255]',
            'email' => 'required|valid_email|is_unique[users.email,id,' . $id . ']',
            'role' => 'required|in_list[superadmin,staff,admission_officer]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'role' => $this->request->getPost('role'),
            'status' => $this->request->getPost('status') ? 1 : 0,
        ];

        // Only update password if provided
        $password = $this->request->getPost('password');
        if ($password && strlen($password) >= 6) {
            $data['password'] = $password;
        }

        if ($this->userModel->update($id, $data)) {
            $this->auditLog->logActivity('Updated user', 'users', $id, $oldData, array_diff_key($data, ['password' => '']));
            return redirect()->to('/admin/users')->with('success', 'User updated successfully.');
        }

        return redirect()->back()->withInput()->with('error', 'Failed to update user.');
    }

    public function delete($id)
    {
        if (session()->get('role') !== 'superadmin') {
            return redirect()->to('/admin/dashboard')->with('error', 'Access denied.');
        }

        // Prevent self-deletion
        if ($id == session()->get('user_id')) {
            return redirect()->to('/admin/users')->with('error', 'You cannot delete your own account.');
        }

        $user = $this->userModel->find($id);

        if (!$user) {
            return redirect()->to('/admin/users')->with('error', 'User not found.');
        }

        if ($this->userModel->delete($id)) {
            $this->auditLog->logActivity('Deleted user', 'users', $id, $user);
            return redirect()->to('/admin/users')->with('success', 'User deleted successfully.');
        }

        return redirect()->to('/admin/users')->with('error', 'Failed to delete user.');
    }
}
