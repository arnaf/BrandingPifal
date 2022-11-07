<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alkes extends Model
{
    protected $fillable = [
        'name', 'brand', 'price', 'photo', 'bpjsStatus', 'stock',
    ];

    protected $hidden = [
        'alkes_category_id', 'unit_id'
    ];

    public function alkesCategory()
    {
        return $this->belongsTo(AlkesCategory::class);
    }
}
