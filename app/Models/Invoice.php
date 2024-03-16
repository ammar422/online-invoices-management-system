<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_number',
        'invoice_date',
        'due_date',
        'product',
        'section',
        'discount',
        'rate_vat',
        'value_vat',
        'tottal',
        'status',
        'value_status',
        'note',
        'user',
    ];

    public function product(): HasOne
    {
        return $this->hasOne(Product::class, 'invoices_id', 'id');
    }
}
