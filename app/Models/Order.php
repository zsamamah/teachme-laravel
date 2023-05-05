<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'teacher_id',
        'date',
        'start_time',
        'end_time',
        'students_num',
        'status'
    ];

    public function own()
    {
        return $this->belongsTo(User::class);
    }

    public function books()
    {
        return $this->hasOne(Book::class);
    }
    
}
