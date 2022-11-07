<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cashier extends Model
{
    protected $fillable = [
        'name',
        'photo',
        'address',
        'dateBirth',
        'status',
        'phone',
        'employee_id'
    ];

    protected $hidden = [
        'user_id'
    ];
}
