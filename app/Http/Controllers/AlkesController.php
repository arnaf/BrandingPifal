<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Alkes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\Facades\DataTables;


class AlkesController extends Controller
{
    public function index()
    {
        $alkeses = DB::table('alkeses')->get();
        $alkesclasifications= DB::table('alkes_clasifications')->get();
        $alkesunits= DB::table('units')->get();

        $data = [
            'alkesclasifications'    => $alkesclasifications,
            'alkeses'            => $alkeses,
            'alkesunits'         => $alkesunits,
            'script'            => 'menus.scripts.alkes'
        ];

        return view('menus.alkes', $data);

    }


    public function show($id) {


        if(is_numeric($id)) {
            $data = Alkes::where('id', $id)->first();
            return Response::json($data);
        }

        $data = DB::table('alkeses')
        ->join('alkes_clasifications', 'alkeses.alkes_clasification_id', '=', 'alkes_clasifications.id')
        ->join('units', 'alkeses.unit_id', '=', 'units.id')
        ->select([
            'alkeses.*', 'alkes_clasifications.name as alkesclasification', 'units.name as alkesunit'
        ])
        ->orderBy('alkeses.id', 'desc');



        return DataTables::of($data)

            ->addColumn(
                'action',
                function($row) {
                    $data = [
                        'id' => $row->id,
                        'name' => $row->name,
                    ];

                    return view('layouts.components.buttons.alkes', $data);
                }
            )
            ->addIndexColumn()
            ->make(true);
    }


    public function store(Request $request)
    {

        if($request->hasFile('alkesPhoto')){
            $extension = $request->file('alkesPhoto')->getClientOriginalExtension();

            $alkesPhoto = date('YmdHis').'.'.$extension;

            $path = base_path('public/photos/alkeses');

            $request->file('alkesPhoto')->move($path, $alkesPhoto);
        }

        if($request == NULL) {
            $json = [
                'msg'       => 'Mohon masukan data obat',
                'status'    => false
            ];

        } if($request->alkesName == NULL) {
            $json = [
                'msg'       => 'Mohon masukan nama alkes',
                'status'    => false
            ];
        } elseif($request->alkesBrand == NULL){
            $json = [
                'msg'       => 'Mohon masukan merk dagang alkes',
                'status'    => false
            ];
        } elseif($request->alkesClasification == NULL){
            $json = [
                'msg'       => 'Mohon masukan klasifikasi alkes',
                'status'    => false
            ];
        } elseif($request->alkesElectroType == NULL){
            $json = [
                'msg'       => 'Mohon masukan tipe elektromedik alkes',
                'status'    => false
            ];
        } elseif($request->alkesRiskType == NULL){
            $json = [
                'msg'       => 'Mohon masukan tipe risiko alkes',
                'status'    => false
            ];
        } elseif($request->alkesUnit == NULL){
            $json = [
                'msg'       => 'Mohon masukan satuan kemasan alkes',
                'status'    => false
            ];
        } elseif($request->alkesPrice == NULL){
            $json = [
                'msg'       => 'Mohon masukan harga alkes',
                'status'    => false
            ];
        } elseif($request->alkesPhoto == NULL){
            $json = [
                'msg'       => 'Mohon masukan foto alkes',
                'status'    => false
            ];
        } elseif($request->alkesBPJSStatus == NULL){
            $json = [
                'msg'       => 'Mohon masukan status BPJS alkes',
                'status'    => false
            ];
        }
        else {
            try{

                DB::transaction(function() use($request, $alkesPhoto) {
                    $alkesCreate = Alkes::create([
                        'name'                    => $request->alkesName,
                        'brand'                   => $request->alkesBrand,
                        'alkes_clasification_id'  => $request->alkesClasification,
                        'electroType'             => $request->alkesElectroType,
                        'riskType'                => $request->alkesRiskType,
                        'unit_id'                 => $request->alkesUnit,
                        'price'                   => $request->alkesPrice,
                        'photo'                   => $alkesPhoto,
                        'bpjsStatus'              => $request->alkesBPJSStatus,
                        'stock'                   => 0,
                        'created_at'              => date('Y-m-d H:i:s')
                    ]);

                });



                $json = [
                    'msg' => 'Data alkes berhasil ditambahkan',
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
        if($request->hasFile('alkesPhotoEdit')){

            $alk = Alkes::find($id);
            $image_path = public_path("photos/alkeses/{$alk->photo}");
            unlink($image_path);

        $extension = $request->file('alkesPhotoEdit')->getClientOriginalExtension();

        $alkesPhotoEdit = date('YmdHis').'.'.$extension;

        $path = base_path('public/photos/alkeses');

        $request->file('alkesPhotoEdit')->move($path, $alkesPhotoEdit);

        }
        if($request == NULL) {
            $json = [
                'msg'       => 'Mohon masukan data member',
                'status'    => false
            ];

        } if($request->alkesNameEdit == NULL) {
            $json = [
                'msg'       => 'Mohon masukan nama alkes',
                'status'    => false
            ];
        } elseif($request->alkesBrandEdit == NULL){
            $json = [
                'msg'       => 'Mohon masukan merk dagang alkes',
                'status'    => false
            ];
        } elseif($request->alkesClasificationEdit == NULL){
            $json = [
                'msg'       => 'Mohon masukan klasifikasi alkes',
                'status'    => false
            ];
        } elseif($request->alkesElectroTypeEdit == NULL){
            $json = [
                'msg'       => 'Mohon masukan tipe elektromedik alkes',
                'status'    => false
            ];
        } elseif($request->alkesRiskTypeEdit == NULL){
            $json = [
                'msg'       => 'Mohon masukan tipe risiko alkes',
                'status'    => false
            ];
        } elseif($request->alkesUnitEdit == NULL){
            $json = [
                'msg'       => 'Mohon masukan satuan kemasan alkes',
                'status'    => false
            ];
        } elseif($request->alkesPriceEdit == NULL){
            $json = [
                'msg'       => 'Mohon masukan harga alkes',
                'status'    => false
            ];
        } elseif($request->alkesPhotoEdit == NULL){
            $json = [
                'msg'       => 'Mohon masukan foto alkes',
                'status'    => false
            ];
        } elseif($request->alkesBPJSStatusEdit == NULL){
            $json = [
                'msg'       => 'Mohon masukan status BPJS alkes',
                'status'    => false
            ];
        }  else {
            try{

              DB::transaction(function () use ($request, $id, $alkesPhotoEdit) {


                $alkesUpdate = Alkes::where('id', $id)->update([
                    'name'                    => $request->alkesNameEdit,
                    'brand'                   => $request->alkesBrandEdit,
                    'alkes_clasification_id'  => $request->alkesClasificationEdit,
                    'electroType'             => $request->alkesElectroTypeEdit,
                    'riskType'                => $request->alkesRiskTypeEdit,
                    'unit_id'                 => $request->alkesUnitEdit,
                    'price'                   => $request->alkesPriceEdit,
                    'photo'                   => $alkesPhotoEdit,
                    'bpjsStatus'              => $request->alkesBPJSStatusEdit,
                    'updated_at'        => date('Y-m-d H:i:s')
                ]);

            });

                $json = [
                    'msg' => 'Data alkes berhasil diubah',
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
        $alk = Alkes::find($id);
        $image_path = public_path("photos/alkeses/{$alk->photo}");
        unlink($image_path);
            try{

              DB::transaction(function() use($id) {
                  DB::table('alkeses')->where('id', $id)->delete();
              });

                $json = [
                    'msg' => 'Data alkes berhasil dihapus',
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
