<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'student_id',
        'order_id'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class);
    }
}
