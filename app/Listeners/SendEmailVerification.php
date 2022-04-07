<?php

namespace App\Listeners;

use App\Mail\VerifyEmail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailVerification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $url = URL::temporarySignedRoute('lettres.confirmEmail', now()->addMinute(5), ['lettre' => $event->lettre->id]);
        Mail::to($event->lettre->email)->send(new VerifyEmail($url));
    }
}
