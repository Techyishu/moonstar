<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use App\Models\LoginAttemptModel;

class CleanupAttempts extends BaseCommand
{
    /**
     * The Command's Group
     *
     * @var string
     */
    protected $group = 'app';

    /**
     * The Command's Name
     *
     * @var string
     */
    protected $name = 'app:cleanup-attempts';

    /**
     * The Command's Description
     *
     * @var string
     */
    protected $description = 'Clean up old login attempts (older than 24 hours) from the database';

    /**
     * The Command's Usage
     *
     * @var string
     */
    protected $usage = 'app:cleanup-attempts';

    /**
     * Run the command
     *
     * @param array $params
     */
    public function run(array $params)
    {
        CLI::write('Cleaning up old login attempts...', 'yellow');

        try {
            $model = new LoginAttemptModel();
            $model->cleanOldAttempts();

            CLI::write('✓ Old login attempts cleaned up successfully!', 'green');
        } catch (\Exception $e) {
            CLI::error('Error cleaning up login attempts: ' . $e->getMessage());
        }
    }
}
