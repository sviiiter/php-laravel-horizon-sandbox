<?php

namespace App\Console\Commands;

use App\Jobs\TestJob;
use Illuminate\Console\Command;

class JobGenerator extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'q:me';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';


    /**
     * Execute the console command.
     */
    public function handle()
    {

        $i = 0;
        while ($i < 3) {
            dispatch(new TestJob($i));
            $this->line($i);
            $i++;
        }
    }

}
