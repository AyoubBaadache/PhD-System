<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Final_grade extends Model
{
    use HasFactory;
    protected $fillable = [
        'Final_AVG',
        'user_id',
    ];
}
