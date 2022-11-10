<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoryStok extends Model
{
    protected $fillable =[

        'stok',
        'drug_id',
        'pembelian_id',
        'penjualan_id',
        'user_id'
    ];

    public function product()
    {
        return $this->belongsTo(Stok::class);
    }


}
