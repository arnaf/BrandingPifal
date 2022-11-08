<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Drug;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\Facades\DataTables;

class DrugController extends Controller
{
    public function index()
    {
        $drugcategories= DB::table('drug_categories')->get();
        $drugtypes= DB::table('drug_types')->get();
        $drugunits= DB::table('units')->get();

        $data = [
            'drugcategories'    => $drugcategories,
            'drugtypes'         => $drugtypes,
            'drugunits'         => $drugunits,
            'script'            => 'menus.scripts.drug'
        ];

        return view('menus.drug', $data);

    }


    public function show($id) {


        if(is_numeric($id)) {
            $data = Drug::where('id', $id)->first();
            return Response::json($data);
        }

        $data = DB::table('drugs')
        ->join('drug_categories', 'drugs.drug_category_id', '=', 'drug_categories.id')
        ->join('units', 'drugs.unit_id', '=', 'units.id')
        ->join('drug_types', 'drugs.drug_type_id', '=', 'drug_types.id')
        ->select([
            'drugs.*', 'drug_categories.name as drugcategory', 'units.name as drugunit', 'drug_types.name as drugtype'
        ])
        ->orderBy('drugs.id', 'desc');



        return DataTables::of($data)

            ->addColumn(
                'action',
                function($row) {
                    $data = [
                        'id' => $row->id,
                        'name' => $row->name,
                    ];

                    return view('layouts.components.buttons.drug', $data);
                }
            )
            ->addIndexColumn()
            ->make(true);
    }


    public function store(Request $request)
    {

        if($request->hasFile('drugPhoto')){
            $extension = $request->file('drugPhoto')->getClientOriginalExtension();

            $gambar = date('YmdHis').'.'.$extension;

            $path = base_path('public/photos/drugs');

            $request->file('drugPhoto')->move($path, $gambar);
        }

        if($request == NULL) {
            $json = [
                'msg'       => 'Mohon masukan data obat',
                'status'    => false
            ];

        } if($request->drugName == NULL) {
            $json = [
                'msg'       => 'Mohon masukan nama obat',
                'status'    => false
            ];
        } elseif($request->drugBrand == NULL){
            $json = [
                'msg'       => 'Mohon masukan merk dagang obat',
                'status'    => false
            ];
        } elseif($request->drugCategory == NULL){
            $json = [
                'msg'       => 'Mohon masukan kategori obat',
                'status'    => false
            ];
        } elseif($request->drugPatentStatus == NULL){
            $json = [
                'msg'       => 'Mohon masukan status paten obat',
                'status'    => false
            ];
        } elseif($request->drugType == NULL){
            $json = [
                'msg'       => 'Mohon masukan data tipe/jenis obat',
                'status'    => false
            ];
        } elseif($request->drugUnit == NULL){
            $json = [
                'msg'       => 'Mohon masukan satuan obat',
                'status'    => false
            ];
        } elseif($request->drugPrice == NULL){
            $json = [
                'msg'       => 'Mohon masukan harga obat',
                'status'    => false
            ];
        } elseif($request->drugPhoto == NULL){
            $json = [
                'msg'       => 'Mohon masukan foto obat',
                'status'    => false
            ];
        } elseif($request->drugBPJSStatus == NULL){
            $json = [
                'msg'       => 'Mohon masukan status BPJS obat',
                'status'    => false
            ];
        }
        else {
            try{

                DB::transaction(function() use($request, $gambar) {
                    $drugCreate = Drug::create([
                        'name'              => $request->drugName,
                        'brand'             => $request->drugBrand,
                        'drug_category_id'  => $request->drugCategory,
                        'patentStatus'      => $request->drugPatentStatus,
                        'drug_type_id'      => $request->drugType,
                        'unit_id'           => $request->drugUnit,
                        'price'             => $request->drugPrice,
                        'photo'             => $gambar,
                        'bpjsStatus'        => $request->drugBPJSStatus,
                        'stock'             => 0,
                        'created_at'        => date('Y-m-d H:i:s')
                    ]);

                });



                $json = [
                    'msg' => 'Data obat berhasil ditambahkan',
                    'status' => true
                ];
            } catch(Exception $e) {
                $json = [
                    'msg'       => 'error',
                    'status'    => false,
                    'e'         => $e->getMessage()
                ];
            }
        }
        return Response::json($json);
    }

    public function edit(Request $request, $id)
    {
        if($request->hasFile('drugPhotoEdit')){
        $extension = $request->file('drugPhotoEdit')->getClientOriginalExtension();

        $drugPhotoEdit = date('YmdHis').'.'.$extension;

        $path = base_path('public/photos/drugs');

        $request->file('drugPhotoEdit')->move($path, $drugPhotoEdit);

        }
        if($request == NULL) {
            $json = [
                'msg'       => 'Mohon masukan data member',
                'status'    => false
            ];

        } if($request->drugNameEdit == NULL) {
            $json = [
                'msg'       => 'Mohon masukan nama obat',
                'status'    => false
            ];
        } elseif($request->drugBrandEdit == NULL){
            $json = [
                'msg'       => 'Mohon masukan merk dagang obat',
                'status'    => false
            ];
        } elseif($request->drugCategoryEdit == NULL){
            $json = [
                'msg'       => 'Mohon masukan kategori obat',
                'status'    => false
            ];
        } elseif($request->drugPatentStatusEdit == NULL){
            $json = [
                'msg'       => 'Mohon masukan status paten obat',
                'status'    => false
            ];
        } elseif($request->drugTypeEdit == NULL){
            $json = [
                'msg'       => 'Mohon masukan data tipe/jenis obat',
                'status'    => false
            ];
        } elseif($request->drugUnitEdit == NULL){
            $json = [
                'msg'       => 'Mohon masukan satuan obat',
                'status'    => false
            ];
        } elseif($request->drugPriceEdit == NULL){
            $json = [
                'msg'       => 'Mohon masukan harga obat',
                'status'    => false
            ];
        } elseif($request->drugPhotoEdit == NULL){
            $json = [
                'msg'       => 'Mohon masukan foto obat',
                'status'    => false
            ];
        } elseif($request->drugBPJSStatusEdit == NULL){
            $json = [
                'msg'       => 'Mohon masukan status BPJS obat',
                'status'    => false
            ];
        }
            else {
            try{

              DB::transaction(function () use ($request, $id, $drugPhotoEdit) {
                // $oldKelas = User::where('id', $id)->first();

                // $oldUser->roles()->detach();


                $drugUpdate = Drug::where('id', $id)->update([
                    'name'              => $request->drugNameEdit,
                    'brand'             => $request->drugBrandEdit,
                    'drug_category_id'  => $request->drugCategoryEdit,
                    'patentStatus'      => $request->drugPatentStatusEdit,
                    'drug_type_id'      => $request->drugTypeEdit,
                    'unit_id'           => $request->drugUnitEdit,
                    'price'             => $request->drugPriceEdit,
                    'photo'             => $drugPhotoEdit,
                    'bpjsStatus'        => $request->drugBPJSStatusEdit,
                    'updated_at'        => date('Y-m-d H:i:s')
                ]);

            });

                $json = [
                    'msg' => 'Data obat berhasil diubah',
                    'status' => true
                ];
            } catch(Exception $e) {
                $json = [
                    'msg'       => 'error',
                    'status'    => false,
                    'e'         => $e
                ];
            }
        }

        return Response::json($json);
    }

    public function destroy($id)
    {

            try{

              DB::transaction(function() use($id) {
                  DB::table('drugs')->where('id', $id)->delete();
              });

                $json = [
                    'msg' => 'Data obat berhasil dihapus',
                    'status' => true
                ];
            } catch(Exception $e) {
                $json = [
                    'msg'       => 'error',
                    'status'    => false,
                    'e'         => $e
                ];
            }


        return Response::json($json);
    }

}
