<?php

namespace App\Http\Controllers\Invoice;

use App\Models\InvoicesAttachmetnt;
use App\Http\Controllers\Controller;
use App\Http\Requests\invoice\StoreInvoicesAttachmetntRequest;
use App\Http\Requests\invoice\UpdateInvoicesAttachmetntRequest;
use Illuminate\Support\Facades\Storage;


class InvoicesAttachmetntController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInvoicesAttachmetntRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    // public function show(InvoicesAttachmetnt $invoicesAttachmetnt)

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InvoicesAttachmetnt $invoicesAttachmetnt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvoicesAttachmetntRequest $request, InvoicesAttachmetnt $invoicesAttachmetnt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InvoicesAttachmetnt $invoicesAttachmetnt)
    {
        //
    }



    public function showFile($id, $folder)
    {
        $attachment = InvoicesAttachmetnt::find($id);
        if ($attachment) {
            $file = Storage::path($folder . '\\' . $attachment->file_name);
            return response()->file($file);
        }
        return redirect()->back()->with('error', 'حدث خطاء ما برجاء المحاولة لاحقاََ');
    }

    public function downloadFile($id, $folder)
    {
        $attachment = InvoicesAttachmetnt::find($id);
        if ($attachment) {
            $file = Storage::path($folder . '\\' . $attachment->file_name);
            return response()->download($file);
        }
        return redirect()->back()->with('error', 'حدث خطاء ما برجاء المحاولة لاحقاََ');
    }
}
