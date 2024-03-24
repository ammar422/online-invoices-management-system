<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoicesDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_id',
        'invoice_number',
        'product',
        'section',
        'status',
        'value_status',
        'note',
        'user',
    ];
}
