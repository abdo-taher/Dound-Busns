<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class RunMultipleMigrations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mo:db {--f} {--s}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run migrations from multiple directories, with options to fresh and seed the database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Check if --f (fresh) option is passed
        if ($this->option('f')) {
            $this->info('Running migrate:fresh...');
            Artisan::call('migrate:fresh', ['--force' => true]); // Run fresh migrations
        }

        // Array of paths for each migration folder
        $paths = [
            '/database/migrations',
        ];

        // Loop through each path and run migrations
        foreach ($paths as $path) {
            Artisan::call('migrate', [
                '--path' => $path,
                '--force' => true  // Use --force to skip confirmation in production
            ]);

            // Output the result of the migration
            $this->info('Migrations run from: ' . $path);
        }

        // Check if --s (seed) option is passed
        if ($this->option('s')) {
            $this->info('Running db:seed...');
            Artisan::call('db:seed', ['--force' => true]); // Run seeders
        }

        return 0;
    }
}
