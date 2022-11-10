<?php

namespace App\Http\Controllers;

use Exception;
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
        ->where('id', '>', 2)
        ->latest('cashiers.created_at')
        ->get();


        $data = [
            'roles'    => $cashiers,
            'script'   => 'components.scripts.cashier'
        ];

        return view('components.menus.cashier', $data);

    }

    public function show($id) {


        if(is_numeric($id)) {
            $data = Cashier::where('id', $id)->first();
            return Response::json($data);
        }

        $data = Cashier::latest('cashiers.created_at')
        ->get();

        return DataTables::of($data)

            ->addColumn(
                'action',
                function($row) {
                    $data = [
                        'id' => $row->id,
                        'photo' => $row->photo,
                        'name' => $row->name,
                        'employeeId' => $row->employeeId,
                        'dateBirth' => $row->dateBirth,
                        'phone' => $row->phone,
                        'address' => $row->address,
                        'status' => $row->status,
                    ];

                    return view('components.buttons.cashier', $data);
                }
            )
            ->addIndexColumn()
            ->make(true);
    }

    public function store(Request $request)
    {

        if($request->has('photo')){
            $cashier = Cashier::where('id')->first();
            $oldImage = $cashier->photo;

            if($oldImage){
                $pleaseRemove = base_path('public/photos/cashiers/').$oldImage;

                if(file_exists($pleaseRemove)) {
                    unlink($pleaseRemove);
                }
            }


        $extension = $request->file('photo')->getClientOriginalExtension();

        $cashierPhoto = date('YmdHis').'.'.$extension;

        $path = base_path('public/photos/cashiers');

        $request->file('photo')->move($path, $cashierPhoto);
        }

        if($request == NULL) {
            $json = [
                'msg'       => 'Mohon masukan data kasir',
                'status'    => false
            ];

        } if($request->name == NULL) {
            $json = [
                'msg'       => 'Mohon masukan nama kasir',
                'status'    => false
            ];

        } elseif($request->photo == NULL){
            $json = [
                'msg'       => 'Mohon masukan foto kasir',
                'status'    => false
            ];
        } elseif($request->employeeId == NULL ){
            $json = [
                'msg'       => 'Mohon masukan nomor pegawai',
                'status'    => false
            ];
        }
         elseif($request->dateBirth == NULL){
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
                    $cashier = Cashier::create([
                        'photo'         => $cashierPhoto,
                        'name'      => $request->name,
                        'nama'         => $request->nama,
                        'tgl_lhr'      => $request->tgl_lhr,
                        'tmp_lhr'      => $request->tmp_lhr,
                        'pendidikan'   => $request->pendidikan,
                        'alamat'       => $request->alamat,
                        'created_at'    => date('Y-m-d H:i:s')
                    ]);
                    $cashier->syncRoles('cashier');


                });

                $json = [
                    'msg' => 'Member berhasil ditambahkan',
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
                'msg'       => 'Mohon masukan data member',
                'status'    => false
            ];

        } if($request->namaEdit == NULL) {
            $json = [
                'msg'       => 'Mohon masukan nama member',
                'status'    => false
            ];

        }  elseif($request->tgl_lhrEdit == NULL) {
            $json = [
                'msg'       => 'Mohon masukan tanggal lahir member',
                'status'    => false
            ];
        } elseif($request->tmp_lhrEdit == NULL) {
            $json = [
                'msg'       => 'Mohon masukan tempat lahir member',
                'status'    => false
            ];
        } elseif($request->alamatEdit == NULL) {
            $json = [
                'msg'       => 'Mohon masukan alamat member',
                'status'    => false
            ];
        } elseif($request->pendidikanEdit == NULL) {
            $json = [
                'msg'       => 'Mohon masukan pendidikan terakhir member',
                'status'    => false
            ];
        } else {
            try{

              DB::transaction(function () use ($request, $id) {
                $oldCashier = Cashier::where('id', $id)->first();

                $oldCashier->roles()->detach();

                if($request->passwordEdit !== null){
                $cashier = Cashier::where('id', $id)->update([
                    'nama'         => $request->namaEdit,
                    'password'     => Hash::make($request->passwordEdit),
                    'tgl_lhr'      => $request->tgl_lhrEdit,
                    'tmp_lhr'      => $request->tmp_lhrEdit,
                    'pendidikan'   => $request->pendidikanEdit,
                    'alamat'       => $request->alamatEdit,
                    'updated_at'   => date('Y-m-d H:i:s')
                ]);
                } else {
                    $cashier = Cashier::where('id', $id)->update([
                        'nama'         => $request->namaEdit,
                        'tgl_lhr'      => $request->tgl_lhrEdit,
                        'tmp_lhr'      => $request->tmp_lhrEdit,
                        'pendidikan'   => $request->pendidikanEdit,
                        'alamat'       => $request->alamatEdit,
                        'updated_at'   => date('Y-m-d H:i:s')
                    ]);
                }
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
