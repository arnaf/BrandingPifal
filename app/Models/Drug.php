<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    protected $fillable = [
        'name', 'brand', 'price', 'photo', 'bpjsStatus', 'patentStatus', 'stock', 'drug_category_id', 'drug_type_id', 'unit_id'
    ];

    protected $hidden = [
        
    ];

    public function drugCategory()
    {
        return $this->belongsTo(DrugCategory::class);
    }


    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }


    public function drugType()
    {
        return $this->belongsTo(DrugType::class);
    }
}
