<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = [
        'c_name',
        'm_id'
    ];

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

}
