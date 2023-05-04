<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'university',
        'major',
        'gpa',
        'phone',
        'city'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
