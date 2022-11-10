<?php

namespace App\Exports;

use App\Models\Drug;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DrugsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection


    */

    public function headings(): array
    {
        return [
            'Nama Obat',
            'Kategori Obat',
            'Tipe Obat',
            'Harga Beli',
            'Harga Jual',
            'Barcode'
        ];
    }
    public function collection()
    {
        return DB::table('drugs')
        ->join('drug_categories', 'drugs.drug_category_id', '=', 'drug_categories.id')
        ->join('drug_types', 'drugs.drug_type_id', '=', 'drug_types.id')
        ->join('drug_details', 'drugs.id', '=', 'drug_details.drug_id')
        ->orderBy('drugs.id', 'desc')
        ->get([
                'drugs.name as drugname', 'drug_categories.name as drugcategory', 'drug_types.name as drugtype', 'drugs.buyPrice', 'drugs.sellPrice', 'drugs.barcode'
        ]);


    }
}
