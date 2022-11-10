<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $fillable = [
        'name'


    ];

    protected $table = 'drug_details';


    public function kategori() {
        return $this->belongsTo(Kategori::class);

    }
    // public function stok() {
    //     return $this->belongsTo(Stok::class);

    // }

    public function stoks()
    {
        return $this->hasMany(Stok::class);
    }




}
