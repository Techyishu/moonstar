<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use App\Models\UserModel;

class CreateAdmin extends BaseCommand
{
    /**
     * The Command's Group
     *
     * @var string
     */
    protected $group = 'Auth';

    /**
     * The Command's Name
     *
     * @var string
     */
    protected $name = 'create:admin';

    /**
     * The Command's Description
     *
     * @var string
     */
    protected $description = 'Creates a new admin user.';

    /**
     * The Command's Usage
     *
     * @var string
     */
    protected $usage = 'create:admin [email] [password] [name]';

    /**
     * The Command's Arguments
     *
     * @var array
     */
    protected $arguments = [
        'email' => 'The email address of the admin',
        'password' => 'The password for the admin',
        'name' => 'The name of the admin (optional, default: Administrator)',
    ];

    /**
     * Actually execute a command.
     *
     * @param array $params
     */
    public function run(array $params)
    {
        $userModel = new UserModel();

        // Get Email
        $email = $params[0] ?? CLI::prompt('Email address', null, 'required|valid_email');

        // Get Password
        $password = $params[1] ?? CLI::prompt('Password', null, 'required|min_length[6]');

        // Get Name
        $name = $params[2] ?? CLI::prompt('Name', 'Administrator');

        CLI::write("Creating admin user...", 'yellow');

        $data = [
            'name' => $name,
            'email' => $email,
            'password' => $password, // Model will hash this automatically
            'role' => 'admin',
            'status' => 1,
        ];

        try {
            // Check if email already exists
            if ($userModel->where('email', $email)->first()) {
                CLI::error("User with email {$email} already exists.");
                return;
            }

            if ($userModel->insert($data)) {
                CLI::write('Admin user created successfully!', 'green');
                CLI::write("Email: {$email}");
                CLI::write("Role: admin");
            } else {
                CLI::error('Failed to create admin user.');
                foreach ($userModel->errors() as $error) {
                    CLI::write($error, 'red');
                }
            }
        } catch (\Exception $e) {
            CLI::error($e->getMessage());
        }
    }
}
