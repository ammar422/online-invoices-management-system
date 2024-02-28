<?php

namespace App\Observers;

use App\Models\Section;
use App\Events\SectionCreated;

class SectionObserver
{
    /**
     * Handle the Section "created" event.
     */
    public function created(Section $section): void
    {
        // SectionCreated::dispatch($section);

    }


    public function creating(Section $section): void
    {
        // SectionCreated::dispatch($section);
    }

    /**
     * Handle the Section "updated" event.
     */
    public function updated(Section $section): void
    {
        //
    }

    /**
     * Handle the Section "deleted" event.
     */
    public function deleted(Section $section): void
    {
        //
    }

    /**
     * Handle the Section "restored" event.
     */
    public function restored(Section $section): void
    {
        //
    }

    /**
     * Handle the Section "force deleted" event.
     */
    public function forceDeleted(Section $section): void
    {
        //
    }
}
