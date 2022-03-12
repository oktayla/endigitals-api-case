<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewSchoolsMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $schools;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($schools)
    {
        $this->schools = $schools;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $schools = $this->schools;
        return $this->view('mail.new_schools', compact('schools'));
    }
}
