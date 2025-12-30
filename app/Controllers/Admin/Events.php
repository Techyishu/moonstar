<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\EventModel;
use App\Models\AuditLogModel;

class Events extends BaseController
{
    protected $eventModel;
    protected $auditLog;

    public function __construct()
    {
        $this->eventModel = new EventModel();
        $this->auditLog = new AuditLogModel();
    }

    public function index()
    {
        $perPage = 15;
        $search = $this->request->getGet('search');

        $builder = $this->eventModel;

        if ($search) {
            $builder = $builder->like('title', $search);
        }

        $data = [
            'title' => 'Manage Events',
            'events' => $builder->orderBy('event_date', 'DESC')->paginate($perPage),
            'pager' => $this->eventModel->pager,
            'search' => $search,
        ];

        return view('admin/events/index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Create Event'];
        return view('admin/events/form', $data);
    }

    public function store()
    {
        $rules = [
            'title' => 'required|min_length[3]',
            'event_date' => 'required|valid_date',
            'description' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'event_date' => $this->request->getPost('event_date'),
            'event_time' => $this->request->getPost('event_time'),
            'location' => $this->request->getPost('location'),
            'status' => $this->request->getPost('status') ? 1 : 0,
        ];

        // Handle image upload
        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/events', $newName);
            $data['image'] = $newName;
        }

        if ($this->eventModel->insert($data)) {
            $this->auditLog->logActivity('Created event', 'events', $this->eventModel->getInsertID(), null, $data);
            return redirect()->to('/admin/events')->with('success', 'Event created successfully.');
        }

        return redirect()->back()->withInput()->with('error', 'Failed to create event.');
    }

    public function edit($id)
    {
        $event = $this->eventModel->find($id);

        if (!$event) {
            return redirect()->to('/admin/events')->with('error', 'Event not found.');
        }

        $data = [
            'title' => 'Edit Event',
            'event' => $event,
        ];

        return view('admin/events/form', $data);
    }

    public function update($id)
    {
        $oldData = $this->eventModel->find($id);

        if (!$oldData) {
            return redirect()->to('/admin/events')->with('error', 'Event not found.');
        }

        $rules = [
            'title' => 'required|min_length[3]',
            'event_date' => 'required|valid_date',
            'description' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'event_date' => $this->request->getPost('event_date'),
            'event_time' => $this->request->getPost('event_time'),
            'location' => $this->request->getPost('location'),
            'status' => $this->request->getPost('status') ? 1 : 0,
        ];

        // Handle image upload
        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            if ($oldData['image'] && file_exists(FCPATH . 'uploads/events/' . $oldData['image'])) {
                unlink(FCPATH . 'uploads/events/' . $oldData['image']);
            }

            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/events', $newName);
            $data['image'] = $newName;
        }

        if ($this->eventModel->update($id, $data)) {
            $this->auditLog->logActivity('Updated event', 'events', $id, $oldData, $data);
            return redirect()->to('/admin/events')->with('success', 'Event updated successfully.');
        }

        return redirect()->back()->withInput()->with('error', 'Failed to update event.');
    }

    public function delete($id)
    {
        $event = $this->eventModel->find($id);

        if (!$event) {
            return redirect()->to('/admin/events')->with('error', 'Event not found.');
        }

        if ($event['image'] && file_exists(FCPATH . 'uploads/events/' . $event['image'])) {
            unlink(FCPATH . 'uploads/events/' . $event['image']);
        }

        if ($this->eventModel->delete($id)) {
            $this->auditLog->logActivity('Deleted event', 'events', $id, $event);
            return redirect()->to('/admin/events')->with('success', 'Event deleted successfully.');
        }

        return redirect()->to('/admin/events')->with('error', 'Failed to delete event.');
    }
}
