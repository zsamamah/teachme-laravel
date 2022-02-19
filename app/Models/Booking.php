<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'location',
        'date',
        'user_id',
        'phone'
    ];

    public function services ()
    {
        return $this->hasMany(Service::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
