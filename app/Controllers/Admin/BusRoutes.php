<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BusRouteModel;
use App\Models\AuditLogModel;

class BusRoutes extends BaseController
{
    protected $routeModel;
    protected $auditLog;

    public function __construct()
    {
        $this->routeModel = new BusRouteModel();
        $this->auditLog = new AuditLogModel();
    }

    public function index()
    {
        $perPage = 15;
        $search = $this->request->getGet('search');

        $builder = $this->routeModel;

        if ($search) {
            $builder = $builder->groupStart()
                ->like('route_number', $search)
                ->orLike('route_name', $search)
                ->groupEnd();
        }

        $data = [
            'title' => 'Bus Routes',
            'routes' => $builder->orderBy('route_number', 'ASC')->paginate($perPage),
            'pager' => $this->routeModel->pager,
            'search' => $search,
        ];

        return view('admin/bus-routes/index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Add New Bus Route'];
        return view('admin/bus-routes/form', $data);
    }

    public function store()
    {
        $rules = [
            'route_number' => 'required',
            'route_name' => 'required|min_length[3]',
            'areas_covered' => 'required',
            'pickup_time' => 'required',
            'drop_time' => 'required',
            'monthly_fee' => 'required|decimal',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'route_number' => $this->request->getPost('route_number'),
            'route_name' => $this->request->getPost('route_name'),
            'areas_covered' => $this->request->getPost('areas_covered'),
            'pickup_time' => $this->request->getPost('pickup_time'),
            'drop_time' => $this->request->getPost('drop_time'),
            'monthly_fee' => $this->request->getPost('monthly_fee'),
            'status' => $this->request->getPost('status') ?? 1,
        ];

        if ($this->routeModel->insert($data)) {
            $this->auditLog->logActivity('Created Bus Route', 'bus_routes', $this->routeModel->getInsertID(), null, $data);
            return redirect()->to('/admin/bus-routes')->with('success', 'Bus route added successfully.');
        }

        return redirect()->back()->withInput()->with('error', 'Failed to add bus route.');
    }

    public function edit($id)
    {
        $route = $this->routeModel->find($id);

        if (!$route) {
            return redirect()->to('/admin/bus-routes')->with('error', 'Route not found.');
        }

        $data = [
            'title' => 'Edit Bus Route',
            'route' => $route,
        ];

        return view('admin/bus-routes/form', $data);
    }

    public function update($id)
    {
        $oldData = $this->routeModel->find($id);

        if (!$oldData) {
            return redirect()->to('/admin/bus-routes')->with('error', 'Route not found.');
        }

        $rules = [
            'route_number' => 'required',
            'route_name' => 'required|min_length[3]',
            'areas_covered' => 'required',
            'pickup_time' => 'required',
            'drop_time' => 'required',
            'monthly_fee' => 'required|decimal',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'route_number' => $this->request->getPost('route_number'),
            'route_name' => $this->request->getPost('route_name'),
            'areas_covered' => $this->request->getPost('areas_covered'),
            'pickup_time' => $this->request->getPost('pickup_time'),
            'drop_time' => $this->request->getPost('drop_time'),
            'monthly_fee' => $this->request->getPost('monthly_fee'),
            'status' => $this->request->getPost('status') ?? 1,
        ];

        if ($this->routeModel->update($id, $data)) {
            $this->auditLog->logActivity('Updated Bus Route', 'bus_routes', $id, $oldData, $data);
            return redirect()->to('/admin/bus-routes')->with('success', 'Bus route updated successfully.');
        }

        return redirect()->back()->withInput()->with('error', 'Failed to update bus route.');
    }

    public function delete($id)
    {
        $route = $this->routeModel->find($id);

        if (!$route) {
            return redirect()->to('/admin/bus-routes')->with('error', 'Route not found.');
        }

        if ($this->routeModel->delete($id)) {
            $this->auditLog->logActivity('Deleted Bus Route', 'bus_routes', $id, $route);
            return redirect()->to('/admin/bus-routes')->with('success', 'Bus route deleted successfully.');
        }

        return redirect()->to('/admin/bus-routes')->with('error', 'Failed to delete bus route.');
    }
}
