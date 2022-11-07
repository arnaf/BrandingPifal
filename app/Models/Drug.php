<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    protected $fillable = [
        'name', 'brand', 'price', 'photo', 'bpjsStatus', 'stock', 'expiredDate'
    ];

    protected $hidden = [
        'drug_category_id', 'unit_id'
    ];

    public function drugCategory()
    {
        return $this->belongsTo(DrugCategory::class);
    }
}
