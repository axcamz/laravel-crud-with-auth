<?php

namespace App\Console\Commands;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Console\Command;

class RefreshDatabaseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'refresh:database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh Database and insert seeds';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Command to refresh database (rollback and migrate)
        $this->call('migrate:refresh');

        // Call seeds in DatabaseSeeder
        $this->call(DatabaseSeeder::class);

        // output message
        $this->info('The database has been refreshed and the seed has been embedded into the database :)');
        return 0;
    }
}
