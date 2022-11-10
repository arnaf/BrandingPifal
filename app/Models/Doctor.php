<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'name',
        'photo',
        'specialist',
        'address',
        'phone',
        'user_id'
    ];

    protected $hidden = [
        'user_id'
    ];
}
