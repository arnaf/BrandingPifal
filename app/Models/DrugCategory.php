<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrugCategory extends Model
{
    protected $fillable = [
        'name',
    ];

    public function drug()
    {
        return $this->hasMany(Drug::class);
    }

}
