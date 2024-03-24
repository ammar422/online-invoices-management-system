<?php

namespace App\Observers;

use App\Models\Invoice;
use App\Models\InvoicesAttachmetnt;
use App\Models\InvoicesDetail;
use Illuminate\Support\Facades\Auth;

class InvoiceObserver
{
    /**
     * Handle the Invoice "creating" event.
     */
    public function created(Invoice $invoice): void
    {
        $details = [
            'invoice_id' => $invoice->id,
            'invoice_number' => $invoice->invoice_number,
            'product' => $invoice->product_id,
            'section' => $invoice->section_id,
            'note' => $invoice->note,
            'user' => Auth::user()->id,
        ];
        InvoicesDetail::create($details);

        if ($invoice->image) {
            $image = uploadImage('attachmetnts', $invoice->image);
            $attachment = [
                'invoice_id' => $invoice->id,
                'invoice_number' => $invoice->invoice_number,
                'product' => $invoice->product_id,
                'file_name' => $image,
                'user' => Auth::user()->id,
            ];
            InvoicesAttachmetnt::create($attachment);
        }
    }
    /**
     * Handle the Invoice "created" event.
     */
    public function creating(Invoice $invoice): void
    {
        // 
    }

    /**
     * Handle the Invoice "updated" event.
     */
    public function updated(Invoice $invoice): void
    {
        //
    }

    /**
     * Handle the Invoice "deleted" event.
     */
    public function deleted(Invoice $invoice): void
    {
        //
    }

    /**
     * Handle the Invoice "restored" event.
     */
    public function restored(Invoice $invoice): void
    {
        //
    }

    /**
     * Handle the Invoice "force deleted" event.
     */
    public function forceDeleted(Invoice $invoice): void
    {
        //
    }
}
