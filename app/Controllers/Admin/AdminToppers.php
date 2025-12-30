<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ToppersModel;

class AdminToppers extends BaseController
{
    protected $toppersModel;

    public function __construct()
    {
        $this->toppersModel = new ToppersModel();
    }

    public function index()
    {
        $data = [
            'toppers' => $this->toppersModel->orderBy('batch_year', 'DESC')->findAll(),
            'pager' => $this->toppersModel->pager,
        ];
        return view('admin/toppers/index', $data);
    }

    public function create()
    {
        return view('admin/toppers/form');
    }

    public function store()
    {
        $rules = [
            'student_name' => 'required',
            'percentage' => 'required',
            'batch_year' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'student_name' => $this->request->getPost('student_name'),
            'standard' => $this->request->getPost('standard'),
            'percentage' => $this->request->getPost('percentage'),
            'rank' => $this->request->getPost('rank'),
            'batch_year' => $this->request->getPost('batch_year'),
            'testimonial' => $this->request->getPost('testimonial'),
        ];

        // Handle Image Upload
        $photo = $this->request->getFile('student_image');
        if ($photo && $photo->isValid() && !$photo->hasMoved()) {
            $newName = $photo->getRandomName();
            $photo->move('uploads/toppers', $newName);
            $data['student_image'] = $newName;
        }

        $this->toppersModel->save($data);
        return redirect()->to('admin/toppers')->with('success', 'Topper added successfully.');
    }

    public function edit($id)
    {
        $data['topper'] = $this->toppersModel->find($id);
        if (empty($data['topper'])) {
            return redirect()->to('admin/toppers')->with('error', 'Topper not found.');
        }
        return view('admin/toppers/form', $data);
    }

    public function update($id)
    {
        $topper = $this->toppersModel->find($id);
        if (empty($topper)) {
            return redirect()->to('admin/toppers')->with('error', 'Topper not found.');
        }

        $data = [
            'id' => $id,
            'student_name' => $this->request->getPost('student_name'),
            'standard' => $this->request->getPost('standard'),
            'percentage' => $this->request->getPost('percentage'),
            'rank' => $this->request->getPost('rank'),
            'batch_year' => $this->request->getPost('batch_year'),
            'testimonial' => $this->request->getPost('testimonial'),
        ];

        $photo = $this->request->getFile('student_image');
        if ($photo && $photo->isValid() && !$photo->hasMoved()) {
            $newName = $photo->getRandomName();
            $photo->move('uploads/toppers', $newName);
            $data['student_image'] = $newName;
        }

        $this->toppersModel->save($data);
        return redirect()->to('admin/toppers')->with('success', 'Topper updated successfully.');
    }

    public function delete($id)
    {
        $this->toppersModel->delete($id);
        return redirect()->to('admin/toppers')->with('success', 'Topper deleted successfully.');
    }
}
