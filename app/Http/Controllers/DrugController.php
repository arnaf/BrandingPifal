<?php

namespace App\Http\Controllers;

use App\Exports\DrugsExport;
use Exception;
use App\Models\Drug;
use App\Models\DrugDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
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
        ->join('drug_types', 'drugs.drug_type_id', '=', 'drug_types.id')
        ->join('drug_details', 'drugs.id', '=', 'drug_details.drug_id')
        ->select([
            'drugs.*', 'drug_categories.name as drugcategory', 'drug_types.name as drugtype'
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


    public function showDetail($id) {


        if(is_numeric($id)) {
            $data = DrugDetail::where('drug_id', $id)->first();
            return Response::json($data);
        }

        $data = DB::table('drug_details')
        ->join('drugs', 'drug_details.drug_id', '=', 'drugs.id')

        ->get();

        return view();

    }






    public function store(Request $request)
    {



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
        } elseif($request->drugCategory == NULL){
            $json = [
                'msg'       => 'Mohon masukan kategori obat',
                'status'    => false
            ];
        } elseif($request->drugType == NULL){
            $json = [
                'msg'       => 'Mohon masukan data tipe/jenis obat',
                'status'    => false
            ];
        }
        else {
            try{

                DB::transaction(function() use($request) {
                    $drugCreate = Drug::create([
                        'name'              => $request->drugName,

                        'drug_category_id'  => $request->drugCategory,

                        'drug_type_id'      => $request->drugType,

                        'created_at'        => date('Y-m-d H:i:s')
                    ]);

                    $drugDetail = DrugDetail::create([
                        'drug_id'           => $drugCreate->id,
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

        if($request == NULL) {
            $json = [
                'msg'       => 'Mohon masukan data obat',
                'status'    => false
            ];

        } if($request->drugNameEdit == NULL) {
            $json = [
                'msg'       => 'Mohon masukan nama obat',
                'status'    => false
            ];
        } elseif($request->drugCategoryEdit == NULL){
            $json = [
                'msg'       => 'Mohon masukan kategori obat',
                'status'    => false
            ];
        } elseif($request->drugTypeEdit == NULL){
            $json = [
                'msg'       => 'Mohon masukan data tipe/jenis obat',
                'status'    => false
            ];
        }
            else {
            try{

              DB::transaction(function () use ($request, $id) {
                // $oldKelas = User::where('id', $id)->first();

                // $oldUser->roles()->detach();


                $drugUpdate = Drug::where('id', $id)->update([
                    'name'              => $request->drugNameEdit,
                    'drug_category_id'  => $request->drugCategoryEdit,
                    'drug_type_id'      => $request->drugTypeEdit,
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


    public function detailUpdate(Request $request, $id)
    {

        //  //$drug = DrugDetail::find($id);
        //  $drug = DrugDetail::where('drug_id','=',$id)->first();

        //  $image_path = public_path("photos/drugs/{$drug->photo}");
        //  unlink($image_path);


        if($request->has('drugPhoto')){
            $drugDetail = DrugDetail::where('drug_id','=',$id)->first();
            $oldImage = $drugDetail->photo;

            if($oldImage){
                $pleaseRemove = base_path('public/photos/drugs/').$oldImage;

                if(file_exists($pleaseRemove)) {
                    unlink($pleaseRemove);
                }
            }


        $extension = $request->file('drugPhoto')->getClientOriginalExtension();

        $drugPhoto = date('YmdHis').'.'.$extension;

        $path = base_path('public/photos/drugs');

        $request->file('drugPhoto')->move($path, $drugPhoto);

        } if($request->drugUnit == NULL){
            $json = [
                'msg'       => 'Mohon masukan satuan obat',
                'status'    => false
            ];
        } elseif($request->sellPrice == NULL){
            $json = [
                'msg'       => 'Mohon masukan harga jual obat',
                'status'    => false
            ];
        } elseif($request->buyPrice == NULL){
            $json = [
                'msg'       => 'Mohon masukan harga beli obat',
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
        } elseif($request->drugPatentStatus == NULL){
            $json = [
                'msg'       => 'Mohon masukan status paten obat',
                'status'    => false
            ];
        } elseif($request->drugDesc == NULL){
            $json = [
                'msg'       => 'Mohon masukan deskripsi obat',
                'status'    => false
            ];
        }   elseif($request->drugUsage == NULL){
            $json = [
                'msg'       => 'Mohon masukan manfaat obat',
                'status'    => false
            ];
        }   elseif($request->drugDosage == NULL){
            $json = [
                'msg'       => 'Mohon masukan dosis obat',
                'status'    => false
            ];
        }   elseif($request->unitDesc == NULL){
            $json = [
                'msg'       => 'Mohon masukan deskripsi satuan kemasan obat',
                'status'    => false
            ];
        }   elseif($request->sideEffect == NULL){
            $json = [
                'msg'       => 'Mohon masukan efek samping obat',
                'status'    => false
            ];
        } elseif($request->bpomNum == NULL){
            $json = [
                'msg'       => 'Mohon masukan nomor registrasi BPOM obat',
                'status'    => false
            ];
        } else {
            try{

              DB::transaction(function () use ($request, $id, $drugPhoto) {
                // $oldKelas = User::where('id', $id)->first();

                // $oldUser->roles()->detach();

                $drugdetail = DrugDetail::where('drug_id', $id)->update([
                    'unit_id'      => $request->drugUnit,
                    'buyPrice'  => $request->buyPrice,
                    'sellPrice'      => $request->sellPrice,
                    'bpjsStatus'      => $request->drugBPJSStatus,
                    'patentStatus'      => $request->drugPatentStatus,
                    'desc'      => $request->drugDesc,
                    'usage'      => $request->drugUsage,
                    'dosage'      => $request->drugDosage,
                    'unitDesc'      => $request->unitDesc,
                    'sideEffect'      => $request->sideEffect,
                    'bpomNum'      => $request->bpomNum,
                    'photo'      => $drugPhoto,
                    'updated_at'        => date('Y-m-d H:i:s')
                ]);

            });

                $json = [
                    'msg' => 'Data detail obat berhasil diubah',
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

            $drugDetail = DrugDetail::where('drug_id','=',$id)->first();
            $oldImage = $drugDetail->photo;

            if($oldImage){
                $pleaseRemove = base_path('public/photos/drugs/').$oldImage;

                if(file_exists($pleaseRemove)) {
                    unlink($pleaseRemove);
                }
            }
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





    public function export()
    {
        return Excel::download(new DrugsExport, 'drugs.xlsx');
    }
}


