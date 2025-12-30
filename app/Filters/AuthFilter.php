<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // Check if user is logged in
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/admin/login')->with('error', 'Please login to access admin area.');
        }

        // Check if specific role is required
        if ($arguments && !empty($arguments)) {
            $userRole = $session->get('role');

            // If specific roles are required, check if user has one of them
            if (!in_array($userRole, $arguments)) {
                return redirect()->to('/admin/dashboard')->with('error', 'You do not have permission to access this page.');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing
    }
}
