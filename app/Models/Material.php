<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'm_name',
    ];

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    public function details()
    {
        return $this->belongsToMany(Detail::class);
    }
    

}
