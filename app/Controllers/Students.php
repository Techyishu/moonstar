<?php

namespace App\Controllers;

use App\Models\StudentModel;

class Students extends BaseController
{
    protected $studentModel;

    public function __construct()
    {
        $this->studentModel = new StudentModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Students List',
            'students' => $this->studentModel->findAll(),
        ];
        return view('students/index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Add New Student'];
        return view('students/create', $data);
    }

    public function store()
    {
        $rules = $this->studentModel->getValidationRules();

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->studentModel->save($this->request->getPost());
        return redirect()->to('/students')->with('success', 'Student added successfully');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Student',
            'student' => $this->studentModel->find($id),
        ];
        return view('students/edit', $data);
    }

    public function update($id)
    {
        $rules = $this->studentModel->getValidationRules();

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->studentModel->update($id, $this->request->getPost());
        return redirect()->to('/students')->with('success', 'Student updated successfully');
    }

    public function delete($id)
    {
        $this->studentModel->delete($id);
        return redirect()->to('/students')->with('success', 'Student deleted successfully');
    }
}
