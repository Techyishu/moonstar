<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\StaffModel;

class AdminStaff extends BaseController
{
    protected $staffModel;

    public function __construct()
    {
        $this->staffModel = new StaffModel();
    }

    public function index()
    {
        $data = [
            'staff' => $this->staffModel->orderBy('display_order', 'ASC')->findAll(),
        ];
        return view('admin/staff/index', $data);
    }

    public function create()
    {
        return view('admin/staff/form');
    }

    public function store()
    {
        $rules = [
            'name' => 'required',
            'designation' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'designation' => $this->request->getPost('designation'),
            'qualification' => $this->request->getPost('qualification'),
            'department' => $this->request->getPost('department'),
            'bio' => $this->request->getPost('bio'),
            'display_order' => $this->request->getPost('display_order'),
        ];

        // Handle Image Upload
        $photo = $this->request->getFile('photo');
        if ($photo && $photo->isValid() && !$photo->hasMoved()) {
            $newName = $photo->getRandomName();
            $photo->move('uploads/staff', $newName);
            $data['photo'] = $newName;
        }

        $this->staffModel->save($data);
        return redirect()->to('admin/staff')->with('success', 'Staff member added successfully.');
    }

    public function edit($id)
    {
        $data['member'] = $this->staffModel->find($id);
        if (empty($data['member'])) {
            return redirect()->to('admin/staff')->with('error', 'Staff member not found.');
        }
        return view('admin/staff/form', $data);
    }

    public function update($id)
    {
        $member = $this->staffModel->find($id);
        if (empty($member)) {
            return redirect()->to('admin/staff')->with('error', 'Staff member not found.');
        }

        $data = [
            'id' => $id,
            'name' => $this->request->getPost('name'),
            'designation' => $this->request->getPost('designation'),
            'qualification' => $this->request->getPost('qualification'),
            'department' => $this->request->getPost('department'),
            'bio' => $this->request->getPost('bio'),
            'display_order' => $this->request->getPost('display_order'),
        ];

        $photo = $this->request->getFile('photo');
        if ($photo && $photo->isValid() && !$photo->hasMoved()) {
            $newName = $photo->getRandomName();
            $photo->move('uploads/staff', $newName);
            $data['photo'] = $newName;
        }

        $this->staffModel->save($data);
        return redirect()->to('admin/staff')->with('success', 'Staff member updated successfully.');
    }

    public function delete($id)
    {
        $this->staffModel->delete($id);
        return redirect()->to('admin/staff')->with('success', 'Staff member deleted successfully.');
    }
}
