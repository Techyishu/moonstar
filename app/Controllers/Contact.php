<?php

namespace App\Controllers;

class Contact extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Contact Us',
            'meta_title' => 'Contact Us - Moonstar School',
            'meta_description' => 'Get in touch with Moonstar School. View our contact information, office hours, and send us a message.',
        ];

        return view('contact/index', $data);
    }

    public function submit()
    {
        // Validation rules
        $rules = [
            'name' => 'required|min_length[3]|max_length[255]',
            'email' => 'required|valid_email',
            'subject' => 'required',
            'message' => 'required|min_length[10]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // In a real application, you would:
        // 1. Save to database (create a ContactMessages table)
        // 2. Send email notification to admin
        // 3. Send confirmation email to user

        // For now, just show success message
        return redirect()->to('/contact')->with(
            'success',
            'Thank you for contacting us! We\'ll get back to you as soon as possible.'
        );
    }
}
