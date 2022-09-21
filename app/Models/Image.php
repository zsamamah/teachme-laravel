<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'saloon_id',
    ];

    public function saloon()
    {
        return $this->belongsTo(Saloon::class);
    }


}
