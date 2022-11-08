<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\AlkesClasification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\Facades\DataTables;

class AlkesClasificationController extends Controller
{
    public function index()
    {
        $alkesclasification= DB::table('alkes_clasifications')->get();

        $data = [
            // 'roles'    => $users,
            'script'   => 'menus.scripts.alkesclasification'
        ];

        return view('menus.alkesclasification', $data);

    }

    public function show($id) {


        if(is_numeric($id)) {
            $data = AlkesClasification::where('id', $id)->first();
            return Response::json($data);
        }

        $data = AlkesClasification::latest('alkes_clasifications.created_at')
        ->get();

        return DataTables::of($data)

            ->addColumn(
                'action',
                function($row) {
                    $data = [
                        'id' => $row->id,
                        'name' => $row->name,
                    ];

                    return view('layouts.components.buttons.alkesclasification', $data);
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

        } if($request->alkesClasificationName == NULL) {
            $json = [
                'msg'       => 'Mohon masukan data klasifikasi alkes',
                'status'    => false
            ];
        }
        else {
            try{

                DB::transaction(function() use($request) {
                    $alkesclasification = AlkesClasification::create([
                        'name' => $request->alkesClasificationName,
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

        } if($request->alkesClasificationNameEdit == NULL) {
            $json = [
                'msg'       => 'Mohon masukan nama kategori alkes',
                'status'    => false
            ];
        } else {
            try{

              DB::transaction(function () use ($request, $id) {
                $oldAlkesClasification = AlkesClasification::where('id', $id)->first();

                $AlkesClasification = AlkesClasification::where('id', $id)->update([
                    'name' => $request->alkesClasificationNameEdit,
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
                  DB::table('alkes_clasifications')->where('id', $id)->delete();
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
