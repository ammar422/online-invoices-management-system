<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_number',
        'invoice_date',
        'due_date',
        'product_id',
        'section_id',
        'collection_amount',
        'commission_amount',
        'discount',
        'rate_vat',
        'value_vat',
        'total',
        'status',
        'value_status',
        'note',
        'user',
        'file',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class, 'section_id', 'id');
    }

    public function details(): HasOne
    {
        return $this->hasOne(InvoicesDetail::class, 'invoice_id', 'id');
    }
    public function attatchments(): HasMany
    {
        return $this->hasMany(InvoicesAttachmetnt::class, 'invoice_id', 'id');
    }
}
