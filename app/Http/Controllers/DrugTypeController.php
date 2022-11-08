<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\DrugType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\Facades\DataTables;

class DrugTypeController extends Controller
{
    public function index()
    {
        $drugtype= DB::table('drug_categories')->get();

        $data = [
            // 'roles'    => $users,
            'script'   => 'menus.scripts.drugtype'
        ];

        return view('menus.drugtype', $data);

    }

    public function show($id) {


        if(is_numeric($id)) {
            $data = DrugType::where('id', $id)->first();
            return Response::json($data);
        }

        $data = DrugType::latest('drug_types.created_at')
        ->get();

        return DataTables::of($data)

            ->addColumn(
                'action',
                function($row) {
                    $data = [
                        'id' => $row->id,
                        'name' => $row->name,
                    ];

                    return view('layouts.components.buttons.drugtype', $data);
                }
            )
            ->addIndexColumn()
            ->make(true);
    }

    public function store(Request $request)
    {


        if($request == NULL) {
            $json = [
                'msg'       => 'Mohon masukan data jenis obat',
                'status'    => false
            ];

        } if($request->drugTypeName == NULL) {
            $json = [
                'msg'       => 'Mohon masukan data jenis obat',
                'status'    => false
            ];
        }
        else {
            try{

                DB::transaction(function() use($request) {
                    $drugtype = DrugType::create([
                        'name' => $request->drugTypeName,
                        'created_at'    => date('Y-m-d H:i:s')
                    ]);

                });

                $json = [
                    'msg' => 'Jenis obat berhasil ditambahkan',
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

    public function edit(Request $request, $id)
    {

        if($request == NULL) {
            $json = [
                'msg'       => 'Mohon masukan data jenis obat',
                'status'    => false
            ];

        } if($request->drugTypeNameEdit == NULL) {
            $json = [
                'msg'       => 'Mohon masukan nama jenis obat',
                'status'    => false
            ];
        } else {
            try{

              DB::transaction(function () use ($request, $id) {
                $oldDrugType = DrugType::where('id', $id)->first();

                $DrugType = DrugType::where('id', $id)->update([
                    'name' => $request->drugTypeNameEdit,
                    'updated_at'   => date('Y-m-d H:i:s')
                ]);
            });

                $json = [
                    'msg' => 'Data jenis obat berhasil diubah',
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
                  DB::table('Drug_Types')->where('id', $id)->delete();
              });

                $json = [
                    'msg' => 'Data Jenis obat berhasil dihapus',
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
