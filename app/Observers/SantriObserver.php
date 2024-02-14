<?php

namespace App\Observers;

use App\Models\Santri;

class SantriObserver
{
    public function created(Santri $santri): void
    {
        $santri->jenjang->decrement('kuota');
    }

    /**
     * Handle the Santri "updated" event.
     */
    public function updated(Santri $santri): void
    {
        //
    }

    public function deleted(Santri $santri): void
    {
        $santri->jenjang->increment('kuota');
    }

    /**
     * Handle the Santri "restored" event.
     */
    public function restored(Santri $santri): void
    {
        //
    }

    /**
     * Handle the Santri "force deleted" event.
     */
    public function forceDeleted(Santri $santri): void
    {
        //
    }
}
