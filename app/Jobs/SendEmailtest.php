<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\SentEmailTest;
use Illuminate\Support\Facades\Mail;

class SendEmailtest implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

     protected $details;
    public function __construct($array)
    {
        $this->details = $array;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $email= new SentEmailTest($this->details);

        Mail::to($this->details['destination'])->send($email);
    }
}
