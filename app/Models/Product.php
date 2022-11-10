<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name'


    ];

    protected $table = 'drugs';


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

    public function detail()
    {
        return $this->hasOne(ProductDetail::class, 'drug_id' );
    }




}
