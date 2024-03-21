<?php

namespace App\Http\Controllers\Invoice;

use App\Models\InvoicesDetail;
use App\Http\Controllers\Controller;
use App\Http\Requests\invoice\StoreInvoicesDetailRequest;
use App\Http\Requests\invoice\UpdateInvoicesDetailRequest;

class InvoicesDetailController extends Controller
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
    public function store(StoreInvoicesDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(InvoicesDetail $invoicesDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InvoicesDetail $invoicesDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvoicesDetailRequest $request, InvoicesDetail $invoicesDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InvoicesDetail $invoicesDetail)
    {
        //
    }
}
