<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'name',
        'photo',
        'address',
        'dateBirth',
        'status',
        'bpjsNum'
    ];

    protected $hidden = [
        'user_id'
    ];
}
