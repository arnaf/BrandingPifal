<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrugDetail extends Model
{
    protected $fillable = [
        'buyPrice', 'sellPrice', 'photo', 'bpjsStatus', 'patentStatus', 'desc', 'usage', 'dosage', 'unitsDesc', 'sideEffect', 'bpomNum', 'drug_id', 'unit_id'
    ];

    protected $hidden = [

    ];


    public function drug()
    {
        return $this->belongsTo(Drug::class, 'id', 'drug_id');
    }


    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }




}
