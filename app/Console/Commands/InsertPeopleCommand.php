<?php

namespace App\Console\Commands;

use App\Actions\InsertPeopleDataAction;
use Illuminate\Console\Command;

class InsertPeopleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-people';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch new data from endpoint and save to database';

    /**
     * Execute the console command.
     */
    public function handle(InsertPeopleDataAction $insertPeopleDataAction): void
    {
        $result = $insertPeopleDataAction->handel();
        if ($result) {
            $this->info('People data inserted successfully!');
        } else {
            $this->error('People data insertion failed!');
        }
    }
}
