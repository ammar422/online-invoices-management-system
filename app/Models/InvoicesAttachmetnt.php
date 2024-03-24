<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoicesAttachmetnt extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_id',
        'invoice_number',
        'file_name',
        'user',
    ];
}
