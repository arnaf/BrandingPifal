<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\DrugCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\Facades\DataTables;

class DrugCategoryController extends Controller
{

    public function index()
    {
        $drugcategory= DB::table('drug_categories')->get();

        $data = [
            // 'roles'    => $users,
            'script'   => 'menus.scripts.drugcategory'
        ];

        return view('menus.drugcategory', $data);

    }

    public function show($id) {


        if(is_numeric($id)) {
            $data = DrugCategory::where('id', $id)->first();
            return Response::json($data);
        }

        $data = DrugCategory::latest('drug_categories.created_at')
        ->get();

        return DataTables::of($data)

            ->addColumn(
                'action',
                function($row) {
                    $data = [
                        'id' => $row->id,
                        'clasification' => $row->clasification,
                    ];

                    return view('layouts.components.buttons.drugcategory', $data);
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

        } if($request->drugCategoryName == NULL) {
            $json = [
                'msg'       => 'Mohon masukan data kategori obat',
                'status'    => false
            ];
        }
        else {
            try{

                DB::transaction(function() use($request) {
                    $drugcategory = DrugCategory::create([
                        'clasification' => $request->drugCategoryName,
                        'created_at'    => date('Y-m-d H:i:s')
                    ]);

                });

                $json = [
                    'msg' => 'Kategori obat berhasil ditambahkan',
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
                'msg'       => 'Mohon masukan data kategori obat',
                'status'    => false
            ];

        } if($request->drugCategoryNameEdit == NULL) {
            $json = [
                'msg'       => 'Mohon masukan nama kategori obat',
                'status'    => false
            ];
        } else {
            try{

              DB::transaction(function () use ($request, $id) {
                $oldDrugCategory = DrugCategory::where('id', $id)->first();

                $DrugCategory = DrugCategory::where('id', $id)->update([
                    'clasification' => $request->drugCategoryNameEdit,
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
                  DB::table('Drug_Categories')->where('id', $id)->delete();
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
