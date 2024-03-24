<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Section extends Model
{
    use HasFactory, Notifiable;

    public $email_address = "ammarSection@email.com";
    protected $fillable = [
        'id',
        'name',
        'description',
        'created_by',
    ];


    public function scopeSection($quary){
        return $quary->select('id','name')->get();
    }

    public function routeNotificationForMail(Notification $notification): array|string
    {
        // Return email address only...
        return $this->email_address;
    }

    public function scopeSectionName($quary){
        return $quary->select('id','name')->get();
    }


    
    public function product():HasMany{
        return $this->hasMany(Product::class ,'section_id','id');
    }
}
