<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\Facades\DataTables;

class DoctorController extends Controller
{

    public function index()
    {
        $doctor= DB::table('doctors')->get();

        $data = [
            // 'doctors'    => $users,
            'script'   => 'menus.scripts.doctor'
        ];

        return view('menus.doctor', $data);

    }

    public function show($id) {


        if(is_numeric($id)) {
            $data = Doctor::where('id', $id)->first();
            return Response::json($data);
        }

        $data = Doctor::latest('created_at')
        ->get();

        return DataTables::of($data)

            ->addColumn(
                'action',
                function($row) {
                    $data = [
                        'id' => $row->id,
                        'name' => $row->name,
                    ];

                    return view('layouts.components.buttons.doctor', $data);
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

        } if($request->doctorName == NULL) {
            $json = [
                'msg'       => 'Mohon masukan data kategori obat',
                'status'    => false
            ];
        }
        else {
            try{



                DB::transaction(function() use($request) {



                    $user = User::create([
                        'email' => Str::lower($request->doctorName.'@mail.com'),
                        'password' => Hash::make('12345678'),
                    ]);

                     $user->assignRole('doctor');


                    $id = Doctor::insertGetId([
                        'user_id' => $user->id,
                        'name' => $request->doctorName,
                        'created_at'    => date('Y-m-d H:i:s')
                    ]);



                });

                $json = [
                    'msg' => 'Doctor berhasil ditambahkan',
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
                'msg'       => 'Mohon masukan data doctor',
                'status'    => false
            ];

        } if($request->doctorNameEdit == NULL) {
            $json = [
                'msg'       => 'Mohon masukan nama ',
                'status'    => false
            ];
        } else {
            try{

              DB::transaction(function () use ($request, $id) {
                $oldDoctor = Doctor::where('id', $id)->first();

                $Doctor = Doctor::where('id', $id)->update([
                    'name' => $request->doctorNameEdit,
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
                  DB::table('doctors')->where('id', $id)->delete();
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
