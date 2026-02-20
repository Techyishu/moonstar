<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\AuditLogModel;

class Auth extends BaseController
{
    public function login()
    {
        // If already logged in, redirect to dashboard
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/admin/dashboard');
        }

        return view('admin/auth/login');
    }

    public function attemptLogin()
    {
        $userModel = new UserModel();
        $auditLog = new AuditLogModel();
        $loginAttemptModel = new \App\Models\LoginAttemptModel();

        $ipAddress = $this->request->getIPAddress();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Check rate limiting (5 failed attempts within 15 minutes)
        if ($loginAttemptModel->isRateLimited($ipAddress)) {
            $expiry = $loginAttemptModel->getRateLimitExpiry($ipAddress);
            $remainingTime = $expiry ? ceil((strtotime($expiry) - time()) / 60) : 15;

            return redirect()->back()
                ->with('error', "Too many failed login attempts. Please try again in {$remainingTime} minutes.");
        }

        // Validation
        if (
            !$this->validate([
                'email' => 'required|valid_email',
                'password' => 'required|min_length[6]',
            ])
        ) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Find user
        $user = $userModel->where('email', $email)->first();

        // Record failed attempt if user not found or password incorrect
        if (!$user || !password_verify($password, $user['password'])) {
            $loginAttemptModel->recordAttempt($ipAddress, $email, false);
            return redirect()->back()->withInput()->with('error', 'Invalid email or password.');
        }

        // Check if user is active
        if ($user['status'] != 1) {
            $loginAttemptModel->recordAttempt($ipAddress, $email, false);
            return redirect()->back()->withInput()->with('error', 'Your account is inactive. Please contact administrator.');
        }

        // Successful login - record attempt and clear previous failed attempts
        $loginAttemptModel->recordAttempt($ipAddress, $email, true);
        $loginAttemptModel->clearAttempts($ipAddress);

        // Regenerate session ID to prevent session fixation
        session()->regenerate();

        // Set session
        $sessionData = [
            'user_id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
            'role' => $user['role'],
            'isLoggedIn' => true,
        ];

        session()->set($sessionData);

        // Log activity
        $auditLog->logActivity('User logged in');

        return redirect()->to('/admin/dashboard')->with('success', 'Welcome back, ' . $user['name'] . '!');
    }

    public function logout()
    {
        $auditLog = new AuditLogModel();

        // Log activity before destroying session
        $auditLog->logActivity('User logged out');

        session()->destroy();
        return redirect()->to('/admin/login')->with('success', 'You have been logged out successfully.');
    }

    public function changePassword()
    {
        $data = [
            'title' => 'Change Password',
        ];

        return view('admin/auth/change-password', $data);
    }

    public function updatePassword()
    {
        $rules = [
            'current_password' => 'required',
            'new_password' => 'required|min_length[6]',
            'confirm_password' => 'required|matches[new_password]',
        ];

        $messages = [
            'confirm_password' => [
                'matches' => 'The confirm password does not match the new password.',
            ],
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }

        $userModel = new UserModel();
        $auditLog = new AuditLogModel();

        $userId = session()->get('user_id');
        $user = $userModel->find($userId);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        // Verify current password
        if (!password_verify($this->request->getPost('current_password'), $user['password'])) {
            return redirect()->back()->with('error', 'Current password is incorrect.');
        }

        // Update password (model will hash it via beforeUpdate callback)
        $userModel->update($userId, [
            'password' => $this->request->getPost('new_password'),
        ]);

        $auditLog->logActivity('Changed password');

        return redirect()->to('/admin/dashboard')->with('success', 'Password changed successfully.');
    }
}

