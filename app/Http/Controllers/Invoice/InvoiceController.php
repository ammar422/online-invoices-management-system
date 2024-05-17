<?php

namespace App\Http\Controllers\Invoice;

use App\Events\InvoiceCreated;
use App\Models\Invoice;
use App\Http\Controllers\Controller;
use App\Http\Requests\invoice\StoreInvoiceRequest;
use App\Http\Requests\invoice\UpdateInvoiceRequest;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $invoices = Invoice::with(['product', 'section'])->get();
        return view('invoices.invoices', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('invoices.add-invoice');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInvoiceRequest $request)
    {
         $invoice = Invoice::create($request->validated());
        if ($invoice) {
            session()->flash('success', 'تم اضافة الفاتورة بنجاح (' . $request->invoice_number . ')');
            return to_route('invoices.index');
        }
        session()->flash('error', 'حدث خطاء ما برجاء المحاولة لاحقاََ');
        return to_route('invoices.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
