<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DisclosureDocumentModel;
use App\Models\AuditLogModel;

class DisclosureDocuments extends BaseController
{
    protected $documentModel;
    protected $auditLog;

    public function __construct()
    {
        $this->documentModel = new DisclosureDocumentModel();
        $this->auditLog = new AuditLogModel();
    }

    public function index()
    {
        $perPage = 15;
        $search = $this->request->getGet('search');

        $builder = $this->documentModel;

        if ($search) {
            $builder = $builder->like('title', $search);
        }

        $data = [
            'title' => 'Disclosure Documents',
            'documents' => $builder->orderBy('display_order', 'ASC')->orderBy('created_at', 'DESC')->paginate($perPage),
            'pager' => $this->documentModel->pager,
            'search' => $search,
        ];

        return view('admin/disclosure/index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Add New Document'];
        return view('admin/disclosure/form', $data);
    }

    public function store()
    {
        $rules = [
            'title' => 'required|min_length[3]',
            'category' => 'required',
            'document_file' => 'uploaded[document_file]|ext_in[document_file,pdf,doc,docx]|max_size[document_file,5120]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'category' => $this->request->getPost('category'),
            'display_order' => $this->request->getPost('display_order') ?? 0,
            'status' => $this->request->getPost('status') ?? 1,
        ];

        // Handle file upload
        $file = $this->request->getFile('document_file');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/disclosure', $newName);
            $data['document_file'] = $newName;
        }

        if ($this->documentModel->insert($data)) {
            $this->auditLog->logActivity('Created Disclosure Document', 'disclosure_documents', $this->documentModel->getInsertID(), null, $data);
            return redirect()->to('/admin/disclosure')->with('success', 'Document added successfully.');
        }

        return redirect()->back()->withInput()->with('error', 'Failed to add document.');
    }

    public function edit($id)
    {
        $document = $this->documentModel->find($id);

        if (!$document) {
            return redirect()->to('/admin/disclosure')->with('error', 'Document not found.');
        }

        $data = [
            'title' => 'Edit Document',
            'document' => $document,
        ];

        return view('admin/disclosure/form', $data);
    }

    public function update($id)
    {
        $oldData = $this->documentModel->find($id);

        if (!$oldData) {
            return redirect()->to('/admin/disclosure')->with('error', 'Document not found.');
        }

        $rules = [
            'title' => 'required|min_length[3]',
            'category' => 'required',
        ];

        // Only validate file if uploaded
        $file = $this->request->getFile('document_file');
        if ($file && $file->isValid()) {
            $rules['document_file'] = 'ext_in[document_file,pdf,doc,docx]|max_size[document_file,5120]';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'category' => $this->request->getPost('category'),
            'display_order' => $this->request->getPost('display_order') ?? 0,
            'status' => $this->request->getPost('status') ?? 1,
        ];

        // Handle file upload
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Delete old file
            if ($oldData['document_file'] && file_exists(FCPATH . 'uploads/disclosure/' . $oldData['document_file'])) {
                unlink(FCPATH . 'uploads/disclosure/' . $oldData['document_file']);
            }

            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/disclosure', $newName);
            $data['document_file'] = $newName;
        }

        if ($this->documentModel->update($id, $data)) {
            $this->auditLog->logActivity('Updated Disclosure Document', 'disclosure_documents', $id, $oldData, $data);
            return redirect()->to('/admin/disclosure')->with('success', 'Document updated successfully.');
        }

        return redirect()->back()->withInput()->with('error', 'Failed to update document.');
    }

    public function delete($id)
    {
        $document = $this->documentModel->find($id);

        if (!$document) {
            return redirect()->to('/admin/disclosure')->with('error', 'Document not found.');
        }

        // Delete file if exists
        if ($document['document_file'] && file_exists(FCPATH . 'uploads/disclosure/' . $document['document_file'])) {
            unlink(FCPATH . 'uploads/disclosure/' . $document['document_file']);
        }

        if ($this->documentModel->delete($id)) {
            $this->auditLog->logActivity('Deleted Disclosure Document', 'disclosure_documents', $id, $document);
            return redirect()->to('/admin/disclosure')->with('success', 'Document deleted successfully.');
        }

        return redirect()->to('/admin/disclosure')->with('error', 'Failed to delete document.');
    }
}
