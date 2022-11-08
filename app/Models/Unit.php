<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = [
        'name',
    ];

    public function drug()
    {
        return $this->hasMany(Drug::class);
    }
    
    public function alkes()
    {
        return $this->hasMany(Alkes::class);
    }
}
