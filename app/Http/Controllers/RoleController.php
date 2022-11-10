<?php

namespace App\Http\Controllers;

use Exception;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{

    public function index()
    {
        $role= DB::table('roles')->get();

        $data = [
            // 'roles'    => $users,
            'script'   => 'menus.scripts.role'
        ];

        return view('menus.role', $data);

    }

    public function show($id) {


        if(is_numeric($id)) {
            $data = Role::where('id', $id)->first();
            return Response::json($data);
        }

        $data = Role::latest('created_at')
        ->get();

        return DataTables::of($data)

            ->addColumn(
                'action',
                function($row) {
                    $data = [
                        'id' => $row->id,
                        'name' => $row->name,
                    ];

                    return view('layouts.components.buttons.role', $data);
                }
            )
            ->addIndexColumn()
            ->make(true);
    }

    public function store(Request $request)
    {


        if($request == NULL) {
            $json = [
                'msg'       => 'Mohon masukan data kategori obat',
                'status'    => false
            ];

        } if($request->roleName == NULL) {
            $json = [
                'msg'       => 'Mohon masukan data kategori obat',
                'status'    => false
            ];
        }
        else {
            try{

                DB::transaction(function() use($request) {
                    $role = Role::create([
                        'name' => $request->roleName,
                        'created_at'    => date('Y-m-d H:i:s')
                    ]);

                });

                $json = [
                    'msg' => 'Role berhasil ditambahkan',
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
                'msg'       => 'Mohon masukan data role',
                'status'    => false
            ];

        } if($request->roleNameEdit == NULL) {
            $json = [
                'msg'       => 'Mohon masukan nama ',
                'status'    => false
            ];
        } else {
            try{

              DB::transaction(function () use ($request, $id) {
                $oldRole = Role::where('id', $id)->first();

                $Role = Role::where('id', $id)->update([
                    'name' => $request->roleNameEdit,
                    'updated_at'   => date('Y-m-d H:i:s')
                ]);
            });

                $json = [
                    'msg' => 'Data kategori obat berhasil diubah',
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
                  DB::table('roles')->where('id', $id)->delete();
              });

                $json = [
                    'msg' => 'Data Kategori obat berhasil dihapus',
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
