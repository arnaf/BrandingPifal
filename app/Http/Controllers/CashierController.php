<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Cashier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\Facades\DataTables;

class CashierController extends Controller
{

    public function index()
    {
        $cashiers= DB::table('cashiers')
        ->latest('cashiers.created_at')
        ->get();


        $data = [
            'roles'    => $cashiers,
            'script'   => 'menus.scripts.cashier'
        ];

        return view('menus.cashier', $data);

    }

    public function show($id) {


        if(is_numeric($id)) {
            $data = Cashier::where('id', $id)->first();
            return Response::json($data);
        }

        $data = Cashier::latest('cashiers.created_at')
        ->get();

        return DataTables::of($data)
            // ->editColumn(
            //     'photo',
            //     function($row) {
            //         $data = [
            //             'photo' => $row->photo
            //         ];

            //         return view('layouts.components.img.cashier', $data);
            //     }
            // )

            ->addColumn(
                'action',
                function($row) {
                    $data = [
                        'id' => $row->id,
                        // 'photo' => $row->photo,
                        'name' => $row->name,
                        'employeeId' => $row->employeeId,
                        'dateBirth' => $row->dateBirth,
                        'phone' => $row->phone,
                        'address' => $row->address,
                        'status' => $row->status,
                    ];

                    return view('layouts.components.buttons.cashier', $data);
                }
            )

            ->addIndexColumn()
            ->make(true);
    }

    public function store(Request $request)
    {




        // $extension = $request->file('photo')->getClientOriginalExtension();

        // $cashierPhoto = date('YmdHis').'.'.$extension;

        // $path = base_path('public/photos/cashiers');

        // $request->file('photo')->move($path, $cashierPhoto);


        if($request == NULL) {
            $json = [
                'msg'       => 'Mohon masukan data kasir',
                'status'    => false
            ];

        } if($request->email == NULL) {
            $json = [
                'msg'       => 'Mohon masukan email kasir',
                'status'    => false
            ];

        } elseif($request->password == NULL) {
            $json = [
                'msg'       => 'Mohon masukan password kasir',
                'status'    => false
            ];

        } elseif($request->name == NULL) {
            $json = [
                'msg'       => 'Mohon masukan nama kasir',
                'status'    => false
            ];

        }  elseif($request->employeeId == NULL ){
            $json = [
                'msg'       => 'Mohon masukan nomor pegawai',
                'status'    => false
            ];
        } elseif($request->dateBirth == NULL){
            $json = [
                'msg'       => 'Mohon masukan tanggal lahir kasir',
                'status'    => false
            ];
        } elseif($request->phone == NULL) {
            $json = [
                'msg'       => 'Mohon masukan nomor telepon kasir',
                'status'    => false
            ];
        } elseif($request->address == NULL) {
            $json = [
                'msg'       => 'Mohon masukan alamat kasir',
                'status'    => false
            ];
        } elseif($request->status == NULL) {
            $json = [
                'msg'       => 'Mohon masukan status kasir',
                'status'    => false
            ];
        }
        else {
            try{

                DB::transaction(function() use($request) {

                    $user = User::create([
                        'email'     =>  $request->email,
                        'password'  =>  Hash::make($request->password),
                        'created_at'    => date('Y-m-d H:i:s')
                    ]);
                    $user->syncRoles('cashier');

                    $cashier = Cashier::create([
                        'user_id'       => $user->id,
                        // 'photo'         => $cashierPhoto,
                        'name'          => $request->name,
                        'employeeId'    => $request->employeeId,
                        'dateBirth'     => $request->dateBirth,
                        'phone'         => $request->phone,
                        'address'       => $request->address,
                        'status'        => $request->status,
                        'created_at'    => date('Y-m-d H:i:s')
                    ]);


                });

                $json = [
                    'msg' => 'Kasir berhasil ditambahkan',
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


        // if($request->has('photo')){
        //     $cashier = Cashier::where('id')->first();
        //     $oldImage = $cashier->photo;

        //     if($oldImage){
        //         $pleaseRemove = base_path('public/photos/cashiers/').$oldImage;

        //         if(file_exists($pleaseRemove)) {
        //             unlink($pleaseRemove);
        //         }
        //     }


        // $extension = $request->file('photo')->getClientOriginalExtension();

        // $cashierPhoto = date('YmdHis').'.'.$extension;

        // $path = base_path('public/photos/cashiers');

        // $request->file('photo')->move($path, $cashierPhoto);

        // }





        if($request == NULL) {
            $json = [
                'msg'       => 'Mohon masukan data member',
                'status'    => false
            ];

        } if($request->nameEdit == NULL) {
            $json = [
                'msg'       => 'Mohon masukan nama kasir',
                'status'    => false
            ];

        } elseif($request->employeeIdEdit == NULL ){
            $json = [
                'msg'       => 'Mohon masukan nomor pegawai',
                'status'    => false
            ];
        } elseif($request->dateBirthEdit == NULL){
            $json = [
                'msg'       => 'Mohon masukan tanggal lahir kasir',
                'status'    => false
            ];
        } elseif($request->phoneEdit == NULL) {
            $json = [
                'msg'       => 'Mohon masukan nomor telepon kasir',
                'status'    => false
            ];
        } elseif($request->addressEdit == NULL) {
            $json = [
                'msg'       => 'Mohon masukan alamat kasir',
                'status'    => false
            ];
        } elseif($request->statusEdit == NULL) {
            $json = [
                'msg'       => 'Mohon masukan status kasir',
                'status'    => false
            ];
        } else {
            try{

                DB::transaction(function() use($request) {


                    $cashier = Cashier::edit([

                        'name'              => $request->nameEdit,
                        'employeeId'        => $request->employeeIdEdit,
                        'dateBirth'         => $request->dateBirthEdit,
                        'phone'             => $request->phoneEdit,
                        'address'           => $request->addressEdit,
                        'status'            => $request->statusEdit,
                        'updated_at'        => date('Y-m-d H:i:s')
                    ]);


                });


                $json = [
                    'msg' => 'Member berhasil diubah',
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


        // $cashier = Cashier::where($id)->first();
        // $oldImage = $cashier->photo;

        // if($oldImage){
        //     $pleaseRemove = base_path('public/photos/cashiers/').$oldImage;

        //     if(file_exists($pleaseRemove)) {
        //         unlink($pleaseRemove);
        //     }
        // }

            try{

              DB::transaction(function() use($id) {
                  DB::table('cashiers')->where('id', $id)->delete();
              });

                $json = [
                    'msg' => 'Member berhasil dihapus',
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
