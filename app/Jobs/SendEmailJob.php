<?php

namespace App\Jobs;

use App\Mail\NewSchoolsMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

use App\Models\School;
use App\Models\User;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $schools = $this->newlyCreatedSchools();
        $email = new NewSchoolsMail($schools);

        foreach( User::all() as $user ) {
            Mail::to($user->email)->send($email);
        }
    }

    private function newlyCreatedSchools() {
        return School::last24h()
        ->latest()
        ->get();
    }
}
