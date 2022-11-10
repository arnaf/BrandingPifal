<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    protected $fillable = [

        'name', 'drug_category_id', 'drug_type_id', 'buyPrice', 'sellPrice', 'barcode'
    ];

    protected $hidden = [

    ];

    public function drugCategory()
    {
        return $this->belongsTo(DrugCategory::class);
    }

    public function drugType()
    {
        return $this->belongsTo(DrugType::class);
    }

    public function detail() {
        return $this->belongsTo(DrugDetail::class, 'id');
    }

    public function stoks()
    {
        return $this->hasMany(Stok::class);
    }

    public function historystoks()
    {
        return $this->hasMany(HistoryStok::class);
    }
}
