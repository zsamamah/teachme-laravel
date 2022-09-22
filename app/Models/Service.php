<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'material_id',
        'saloon_id',
        'price',
    ];

    public function material()
    {
        return $this->hasMany(Material::class);
    }

    public function saloon()
    {
        return $this->belongsTo(Saloon::class);
    }

}
