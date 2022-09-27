<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'material_id',
        'chapter_id',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function material()
    {
        return $this->hasOne(Material::class);
    }

    public function chapter()
    {
        return $this->hasOne(Chapter::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

}
