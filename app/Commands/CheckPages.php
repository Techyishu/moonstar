<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class CheckPages extends BaseCommand
{
    protected $group = 'Database';
    protected $name = 'check:pages';
    protected $description = 'Check if pages exist in database';

    public function run(array $params)
    {
        $db = \Config\Database::connect();
        $result = $db->query("SELECT id, title, slug, status FROM pages")->getResultArray();

        CLI::write('Pages in database:', 'yellow');
        CLI::write('==================', 'yellow');

        if (empty($result)) {
            CLI::write('NO PAGES FOUND!', 'red');
            CLI::write('Running seeder...', 'yellow');

            // Run the seeder
            $seeder = \Config\Database::seeder();
            $seeder->call('PageSeeder');

            CLI::write('Seeder completed. Checking again...', 'green');
            $result = $db->query("SELECT id, title, slug, status FROM pages")->getResultArray();
        }

        foreach ($result as $page) {
            CLI::write("ID: {$page['id']}, Title: {$page['title']}, Slug: {$page['slug']}, Status: {$page['status']}", 'green');
        }

        CLI::write("\nTotal pages: " . count($result), 'yellow');
    }
}
