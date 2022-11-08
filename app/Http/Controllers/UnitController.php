<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\Facades\DataTables;

class UnitController extends Controller
{
    public function index()
    {
        $unit= DB::table('units')->get();

        $data = [
            // 'roles'    => $users,
            'script'   => 'menus.scripts.unit'
        ];

        return view('menus.unit', $data);

    }

    public function show($id) {


        if(is_numeric($id)) {
            $data = Unit::where('id', $id)->first();
            return Response::json($data);
        }

        $data = Unit::latest('units.created_at')
        ->get();

        return DataTables::of($data)

            ->addColumn(
                'action',
                function($row) {
                    $data = [
                        'id' => $row->id,
                        'name' => $row->name,
                    ];

                    return view('layouts.components.buttons.unit', $data);
                }
            )
            ->addIndexColumn()
            ->make(true);
    }

    public function store(Request $request)
    {


        if($request == NULL) {
            $json = [
                'msg'       => 'Mohon masukan data klasifikasi alkes',
                'status'    => false
            ];

        } if($request->unitName == NULL) {
            $json = [
                'msg'       => 'Mohon masukan data klasifikasi alkes',
                'status'    => false
            ];
        }
        else {
            try{

                DB::transaction(function() use($request) {
                    $unit = Unit::create([
                        'name' => $request->unitName,
                        'created_at'    => date('Y-m-d H:i:s')
                    ]);

                });

                $json = [
                    'msg' => 'Kategori alkes berhasil ditambahkan',
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
                'msg'       => 'Mohon masukan data kategori alkes',
                'status'    => false
            ];

        } if($request->unitNameEdit == NULL) {
            $json = [
                'msg'       => 'Mohon masukan nama kategori alkes',
                'status'    => false
            ];
        } else {
            try{

              DB::transaction(function () use ($request, $id) {
                $oldunit = Unit::where('id', $id)->first();

                $unit = Unit::where('id', $id)->update([
                    'name' => $request->unitNameEdit,
                    'updated_at'   => date('Y-m-d H:i:s')
                ]);
            });

                $json = [
                    'msg' => 'Data kategori alkes berhasil diubah',
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
                  DB::table('units')->where('id', $id)->delete();
              });

                $json = [
                    'msg' => 'Data klasifikasi alkes berhasil dihapus',
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
