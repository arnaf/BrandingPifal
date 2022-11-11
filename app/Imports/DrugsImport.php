<?php

namespace App\Imports;

use App\Models\Drug;
use App\Models\DrugDetail;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMappedCells;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class DrugsImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */


    public function collection(Collection $rows)
    {

        // DB::table('drugs')
        // ->join('drug_categories', 'drugs.drug_category_id', '=', 'drug_categories.id')
        // ->join('drug_types', 'drugs.drug_type_id', '=', 'drug_types.id')
        // ->join('drug_details', 'drugs.id', '=', 'drug_details.drug_id')
        // ->select([
        //     'drugs.name as drugname', 'drug_categories.name as drugcategory', 'drug_types.name as drugtype'
        // ]);

        foreach($rows as $row){
            $drug = Drug::create([
                'name'                => $row['Nama'],
                'drug_category_id'    => $row['ID Kategori Obat'],
                'drug_type_id'        => $row['ID Tipe Obat'],
                'buyPrice'            => $row['Harga Jual'],
                'sellPrice'           => $row['Harga Beli'],
                'barcode'             => $row['Barcode'],
            ]);

            DrugDetail::create([
                'drug_id' => $drug->id,
                'unit_id' => $row['ID Bentuk Kemasan'],
                'bpjsStatus' => $row['Status BPJS'],
                'patentStatus' => $row['Status Kepatenan'],
                'desc' => $row['Deskripsi Obat'],
                'usage' => $row['Kegunaan/Manfaat'],
                'dosage' => $row['Dosis Obat'],
                'sideEffect' => $row['Efek Samping'],
                'bpomNum' => $row['Nomor Izin Edar BPOM']
            ]);

        }


    }

    public function headingRow(): int
    {
        return 5;
    }



    // public function model(array $row)
    // {
    //     return new Drug([
    //        'name'                => $row[0],
    //        'drug_category_id'    => $row[1],
    //        'drug_type_id'        => $row[2],
    //     ]);
    // }
}
