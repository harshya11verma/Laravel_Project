<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class GetDBName extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:get-db-name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Returns name of current database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dbName=DB::connection()->getDatabaseName();
        $this->info("Current name of db is: $dbName");
    }
}
