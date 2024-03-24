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
            'user' => 'required','exists:users,name',
            'invoice_number' => 'required','string','max:100',
            'invoice_date' => 'required|date',
            'due_date' => 'required', 'date',
            'product_id' => 'required', 'exists:products,id',
            'section_id' => 'required', 'exists:sections,id',
            'collection_amount' => 'required', 'numeric',
            'commission_amount' => 'required', 'numeric',
            'discount' => 'required', 'numeric',
            'rate_vat' => 'required',
            'value_vat' => 'required',
            'total' => 'required',
            'note' => 'nullable', 'max:255',
            'image' => 'required','image', 'mimes:png,jpg', 'size:1024'
        ];
    }
}
