<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title',
        'user_id',
        'subject_id',
        'claim',
        'status',
        'created_at',
        'updated_at',
    ];
}
