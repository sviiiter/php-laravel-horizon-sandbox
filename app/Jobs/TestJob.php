<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class TestJob implements ShouldQueue
{

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 86400;


    /**
     * Create a new job instance.
     */
    public function __construct(private $tag)
    {
    }


    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::debug('Handle', ['tag' => $this->tag]);
        sleep(120);
        Log::debug('120 seconds are gone', ['tag' => $this->tag]);
//        $i = 0;
//        while ($i < 120) {
//            sleep(1);
//            Log::debug('second is gone', ['tag' => $this->tag]);
//            $i++;
//        }

        throw new \Exception('Here is custom exception');
        Log::debug('Job iteration finished');
    }


    public function tags()
    {
        return ['test job', 'IDD:'.$this->tag];
    }

}
