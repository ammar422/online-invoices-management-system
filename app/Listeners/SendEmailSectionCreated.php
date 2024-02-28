<?php

namespace App\Listeners;

use App\Events\SectionCreated;
use App\Notifications\SectionCreatedEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailSectionCreated
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SectionCreated $event): void
    {
        $event->section->notify(new SectionCreatedEmail());
    }
}
