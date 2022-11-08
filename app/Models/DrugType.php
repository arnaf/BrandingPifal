<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrugType extends Model
{
    protected $fillable = [
        'name',
    ];

    public function drug()
    {
        return $this->hasMany(Drug::class);
    }
}
