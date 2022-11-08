<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alkes extends Model
{

    protected $table = 'alkeses';

    protected $fillable = [
        'name', 'brand', 'price', 'photo', 'bpjsStatus', 'electroType', 'riskType', 'stock', 'alkes_clasification_id', 'unit_id'
    ];

    protected $hidden = [

    ];

    public function alkesCategory()
    {
        return $this->belongsTo(AlkesCategory::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
