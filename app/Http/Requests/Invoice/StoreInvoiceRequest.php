<?php

namespace App\Http\Requests\invoice;

use Illuminate\Foundation\Http\FormRequest;

class StoreInvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'invoice_number' => 'required|numeric',
            'invoice_date' => 'required|date',
            'due_date' => 'required','date',
            'section' => 'required','exists:sections,name',
            'product' => 'required','exists:products,product_name',
            'collection-amount' => 'required','numeric',
            'commission-amount' => 'required','numeric',
            'discount' => 'required','numeric',
            'rate_vat' => 'required',
            'value_vat' => 'required',
            'total' => 'required',
            'note' => 'nullable','max:255',
            'pic' => 'required','image','mimes:png,jpg','size:1024'
        ];
    }
}
